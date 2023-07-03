<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    {{-- /*****BOOTSTRAP y CSS*****/ --}}
    @vite(['resources/css/app.css'])
    {{ $style ?? '' }}
</head>
<body>
    <x-nav/>
    {{ $slot }}
    {{ $script ?? '' }}








    <x-footer/>
    @vite(['resources/js/app.js'])
</body>
</html>