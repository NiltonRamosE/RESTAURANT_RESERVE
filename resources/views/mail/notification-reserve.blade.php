<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notificación de Reserva</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #3498db;
            font-size: 24px;
        }

        .message {
            text-align: justify;
            margin: 20px 0;
            font-size: 16px;
            line-height: 1.6;
        }

        .info {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background-color: #f8f9fa;
        }

        .info p {
            margin: 0 0 12px;
            font-size: 16px;
            line-height: 1.5;
        }

        .info p span {
            font-weight: bold;
            color: #2c3e50;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #7f8c8d;
        }

        footer p {
            margin: 5px 0;
        }

        @media (max-width: 600px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 20px;
            }

            .message, .info p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Notificación de Reserva</h1>

        <div class="message">
            <p>Estimado cliente, le recordamos su reserva en <strong>7 SOPAS</strong>. Por favor, planifique su llegada con antelación. Si no llega a tiempo, lamentablemente no podremos garantizar la disponibilidad de su mesa.</p>
        </div>

        <div class="info">
            <p><span>Cliente:</span> {{ $reserveInformation['cliente'] }}</p>
            <p><span>Fecha de la Reserva:</span> {{ \Carbon\Carbon::parse($reserveInformation['fecha'])->locale('es')->translatedFormat('l, j \de F \de Y') }}</p>
            <p><span>Hora de la Reserva:</span> {{ \Carbon\Carbon::parse($reserveInformation['hora'])->format('H:i') }} hrs</p>
            <p><span>Número de Mesa:</span> {{ $reserveInformation['numero_mesa'] }}</p>
        </div>

        <footer>
            <p>Gracias por confiar en nosotros. ¡Esperamos verlo pronto!</p>
            <p><strong>7 SOPAS</strong> - La mejor experiencia culinaria.</p>
        </footer>
    </div>
</body>
</html>
