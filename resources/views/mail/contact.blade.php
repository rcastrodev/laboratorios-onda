<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table, th, td{
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Contacto desde el sitio web</h2>
    <div>
        <p><strong>Nombre:</strong>  {{ $data['nombre'] }}  </p>
        @if (isset($data['apellido']))
            <p><strong>Apellido:</strong>  {{ $data['apellido'] }} </p>
        @endif
        <p><strong>Email:</strong>  {{ $data['email'] }} </p>
        @if (isset($data['celular']))
            <p><strong>Celular:</strong> {{ $data['celular'] }} </p>
        @endif
        @if (isset($data['mensaje']))
            <p><strong>Mensaje:</strong>  {{ $data['mensaje'] }} </p>
        @endif        
    </div>    
</body>
</html>