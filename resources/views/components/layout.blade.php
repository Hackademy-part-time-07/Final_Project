<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    @livewireStyles
    {{-- /*****BOOTSTRAP y CSS*****/ --}}
    @vite(['resources/css/app.css'])
    {{ $style ?? '' }}

</head>
<body>
    <x-nav/>
    {{ $slot }}
    








    <x-footer/>
    @livewireScripts
    {{ $script ?? '' }}
    @vite(['resources/js/app.js'])
</body>
</html>