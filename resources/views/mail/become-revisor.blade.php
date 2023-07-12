<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Metapop - {{__('Solicitud de revisor') }}</title>
</head>
<body>
    <div>
        <h1>{{__('Un usuario quiere trabajar con nosotros') }}</h1>
        <h2>{{__('A continuación sus datos') }}:</h2>
        <p><b>{{__('Nombre') }}:</b>{{ $user->name }}</p>
        <p>{{__('Si quieres que haga parte de nuestro equipo pulse aquí') }}</p>
        <a class="btn btn-success" href="{{ route('revisor.make', $user) }}">{{__('Acepta la solicitud') }}</a>
</body>
</html>