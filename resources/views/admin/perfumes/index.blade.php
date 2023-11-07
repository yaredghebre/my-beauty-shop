@extends('layouts.admin')

@section('content')
    {{-- Heading --}}
    <h1 class="text-center text-3xl">Perfumes</h1>

    {{-- Filter & Add --}}
    <div class="w-full flex justify-between">
        <form action="{{ route('admin.perfumes.index') }}" method="GET" class=" my-2 flex w-1/4 gap-2">
            @csrf
            <label for="" class="rounded-md">
                <select name="category_id" id="category" class="form-select">
                    <option value="">All</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700">Filtra</button>
            </label>
        </form>

        <div
            class="focus:outline-none text-black bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:focus:ring-yellow-900">
            <a href="{{ route('admin.perfumes.create') }}" class="text-xl text-dark">Aggiungi +</a>
        </div>
    </div>

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
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Type
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

                        @if ($perfume->category)
                            <td class="px-6 py-4">
                                {{ $perfume->category->name }}
                            </td>
                        @else
                            <td class="px-6 py-4">N/A</td>
                        @endif

                        @if ($perfume->type)
                            <td class="px-6 py-4">
                                {{ $perfume->type->name }}
                            </td>
                        @else
                            <td class="px-6 py-4">N/A</td>
                        @endif

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

            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="my-2">
            {{ $perfumes->links() }}
        </div>
        <div class="flex w-full items-center">
            {{ $perfumes->links('partials.pagination') }}
        </div>
    </div>
@endsection
