<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mensaje recibido</title>
</head>
<body>
    <p>Recibiste mensaje de: {{ $msg['name'] }} - {{ $msg['email'] }}</p>
    <p>Asunto: {{ $msg['subject'] }}</p>
    <p>Contenido: {{ $msg['content'] }}</p>
</body>
</html>