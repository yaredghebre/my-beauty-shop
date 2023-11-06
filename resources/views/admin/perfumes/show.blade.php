@extends('layouts.admin')

@section('content')
    <div class="">

        <div class="flex justify-center">
            <div class="max-w-2xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                {{-- Card Image --}}
                <img class="rounded-t-lg w-full" src="https://picsum.photos/500" alt="{{ $perfume->title }}" />

                {{-- Card Body --}}
                <div class="p-5">
                    <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $perfume->title }}
                    </h5>
                    @if ($perfume->description)
                        <p class="mb-3 text-2xl text-gray-700 dark:text-gray-400">{{ $perfume->description }}</p>
                    @else
                        <p class="mb-3 text-2xl text-gray-700 dark:text-gray-400">No description available</p>
                    @endif

                    <ul class="text-xl">
                        @if ($perfume->category)
                            <li>Category: <span class="font-bold text-2xl">{{ $perfume->category->name }}</span></li>
                        @else
                            <li>Category: <span class="font-bold text-2xl">N/A</span></li>
                        @endif

                        @if ($perfume->type)
                            <li>Type: <span class="font-bold text-2xl">{{ $perfume->type->name }}</span></li>
                        @else
                            <li>Type: <span class="font-bold text-2xl">N/A</span></li>
                        @endif

                        <li>Brand: <span class="font-bold">{{ $perfume->brand }}</span> </li>
                        <li>Size: <span class="font-bold">{{ $perfume->size }}</span> </li>
                        <li>Price: <span class="font-bold">€ {{ $perfume->price }}</span> </li>
                        <li>Available: <span class="font-bold">
                                @if ($perfume->available == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </span>
                        </li>
                    </ul>

                </div>
            </div>

        </div>


    </div>
@endsection
