<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function getPrecio(string $id)
    {
        $mesa = Mesa::find($id);

        if ($mesa) {
            return response()->json([
                'success' => true,
                'precio' => $mesa->precio
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Mesa no encontrada'
        ], 404);
    }
}
