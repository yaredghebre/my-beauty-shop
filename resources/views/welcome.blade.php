{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @vite('resources/css/app.css')

</head>

<body>
    <h1 class="text-3xl font-bold underline bg-red-500">
        Hello world!
    </h1>
</body>

</html> --}}

@extends('layouts.app')
@section('content')
    <main>
        <div class="w-full h-full bg-blue-300">
            <div class="container py-5 text-center">
                <h1>Benvenuto in My Beauty Shop</h1>
            </div>
        </div>
    </main>
@endsection
