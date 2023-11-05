@extends('layouts.admin')

@section('content')
    <div class="text-center pt-12">
        <h1 class="text-4xl">Benvenuto {{ Auth::user()->name }}!</h1>
        <p class="text-2xl mt-5">La tua esperienza comincia qui!</p>
        <p class="text-2xl">Utilizza il menu a sinistra per scorrere tra i tuoi prodotti</p>
    </div>
@endsection
