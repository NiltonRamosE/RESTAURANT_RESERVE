<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correo de Confirmación de la Reserva</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2c3e50;
            font-size: 26px;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #34495e;
            margin-bottom: 12px;
        }

        .table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .table td {
            padding: 8px;
            border: 1px solid #ecf0f1;
        }

        .table th {
            background-color: #3498db;
            color: white;
            padding: 10px;
            text-align: left;
        }

        .table td, .table th {
            text-align: left;
        }

        footer {
            text-align: center;
            font-size: 14px;
            color: #95a5a6;
            margin-top: 30px;
        }

        .highlight {
            font-weight: bold;
            color: #2c3e50;
        }

        .highlight-table {
            font-weight: bold;
            color: #3498db;
        }

        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 22px;
            }

            .table {
                font-size: 14px;
            }

            footer {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Confirmación de Reserva</h1>
        <p><span class="highlight">Fecha:</span> {{ \Carbon\Carbon::parse($reserva->fecha)->format('l, j F Y') }}</p>
        <p><span class="highlight">Hora:</span> {{ \Carbon\Carbon::parse($reserva->hora)->format('H:i') }}</p>

        <h2>Datos del Cliente</h2>
        <p><span class="highlight">Cliente:</span> {{ $cliente->nombre }} {{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}</p>
        <p><span class="highlight">Celular:</span> {{ $cliente->celular }}</p>

        <h2>Detalles de la Mesa</h2>
        <table class="table">
            <tr>
                <th>Mesa</th>
                <td>{{ $mesa->numero }}</td>
            </tr>
            <tr>
                <th>Cantidad de Asientos</th>
                <td>{{ $mesa->cantidad_asientos }}</td>
            </tr>
            <tr>
                <th>Precio</th>
                <td>S/ {{ number_format($mesa->precio, 2) }}</td>
            </tr>
            <tr>
                <th>Piso</th>
                <td>{{ $mesa->piso }}</td>
            </tr>
        </table>

        <footer>
            <p>Gracias por elegirnos. ¡Esperamos verte pronto!</p>
            <p>7 SOPAS - La mejor experiencia culinaria.</p>
        </footer>
    </div>
</body>
</html>
