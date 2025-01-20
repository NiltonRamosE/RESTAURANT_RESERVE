<?php

namespace App\Http\Controllers;

use App\Http\Requests\reserva\StoreReservaRequest;
use App\Mail\ReserveMailConfirmation;
use App\Models\Mesa;
use App\Models\Reserva;
use App\Services\TwilioService;
use Illuminate\Support\Facades\Mail;

class ReservaController extends Controller
{

    protected $twilio;

    public function __construct(TwilioService $twilio)
    {
        $this->twilio = $twilio;
    }

    public function index()
    {
        $mesas = Mesa::where('estado', '!=', 'MANTENIMIENTO')->get();

        return view('pages.reservas', compact('mesas'));
    }

    public function create()
    {
        //
    }

    public function store(StoreReservaRequest $request)
    {
        $validated = $request->validated();

        $userInSession = session('userIsAuthenticated');
        if (!$userInSession || !isset($userInSession['user']['id'])) {
            return redirect()->back()->withErrors(['error' => 'El usuario no tiene un cliente asociado.']);
        }

        $informationOfClient = $userInSession['user'];

        $validated['cliente_id'] = $informationOfClient->id;

        $reservaCreated = Reserva::create($validated);

        

        $mesaFound = Mesa::find($validated['mesa_id']);

        $this->sendReserveMailConfirmation($userInSession['correo'], $informationOfClient, $reservaCreated, $mesaFound);

        $cliente_fullname = $informationOfClient->nombre . ' ' . $informationOfClient->apellido_paterno . ' ' . $informationOfClient->apellido_materno;

        $message_sms = 
            "
                Estimado {$cliente_fullname}. Le agradecemos su preferencia al reservar en 7 SOPAS. La mesa Nº {$mesaFound->numero} fue reservada correctamente para el {$reservaCreated->fecha} a las {$reservaCreated->hora}. 
                Con una duración {$reservaCreated->duracion} de {$reservaCreated->calculateDuration($reservaCreated->duracion)} horas. Para más información revisar su correo gmail. Gracias.
                Atte. 7 SOPAS
            ";

        $this->twilio->sendSMS('+51' . $informationOfClient->celular, $message_sms);

        if (isset($reservaCreated)) {
            return to_route('reserva.index')->with('status', 'Reserva completada correctamente');
        }

        return to_route('reserva.index')->withErrors('error', 'La reserva no se ha podido crear correctamente');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(StoreReservaRequest $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    private function sendReserveMailConfirmation($email_destinario, $informationOfClient, $reservaCreated, $mesaFound)
    {
        Mail::to($email_destinario)->send(new ReserveMailConfirmation($informationOfClient, $reservaCreated, $mesaFound));
    }
}
