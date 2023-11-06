@extends('layouts.admin')

@section('content')
    {{-- Heading --}}
    <h1 class="text-center text-5xl">Perfumes</h1>

    {{-- Table --}}
    <div class="">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Gender
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Brand
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Size
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($perfumes as $perfume)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $perfume->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $perfume->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $perfume->gender }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $perfume->brand }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $perfume->size }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $perfume->price }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $perfume->description }}
                        </td>
                        <td class="px-6 py-4 flex gap-4">
                            <a href="{{ route('admin.perfumes.show', $perfume->id) }}">
                                <i class="fa-solid fa-magnifying-glass fa-xl hover:scale-125 transform transition duration-200"
                                    style="color: #00ff00;"></i>
                            </a>
                            <a href="">
                                <i class="fa-solid fa-pen-to-square fa-xl hover:scale-125 transform transition duration-200"
                                    style="color: #0000ff;"></i>
                            </a>
                            <a href="">
                                <i class="fa-regular fa-trash-can fa-xl hover:scale-125 transform transition duration-200"
                                    style="color: #ff0000;"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                {{-- Pagination --}}
                {{ $perfumes->links() }}
            </tbody>
        </table>
    </div>
@endsection
