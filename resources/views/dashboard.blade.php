@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h2 class="text-gray-500 text-xl my-4">
            {{ __('Dashboard') }}
        </h2>
        <div class="flex justify-center">
            <div class="w-full">
                <div class="bg-white shadow-md p-4">
                    <div class="font-bold text-lg">{{ __('User Dashboard') }}</div>

                    <div class="mt-4">
                        @if (session('status'))
                            <div class="bg-green-200 text-green-700 py-2 px-4 rounded">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
