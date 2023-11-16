@extends('layouts.admin')

@section('content')
    <h1 class="text-center text-3xl">Edit Perfume</h1>

    @include('partials.errors')

    <div class="container mx-auto my-10 border-4 rounded-lg bg-gray-200 border-gray-700 p-5">

        {{-- FORM BODY --}}
        <form action="{{ route('admin.perfumes.update', $perfume->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title:</label>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $perfume->title) }}">
                @error('title')
                    <div class="">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Brand --}}
            <div class="mb-3">
                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Brand:</label>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    @error('brand') is-invalid @enderror" id="brand" name="brand"
                    value="{{ old('brand', $perfume->brand) }}">
                @error('brand')
                    <div class="">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Size --}}
            <div class="mb-3">
                <label for="size" class="block mb-2 text-sm font-medium text-gray-900">Size:</label>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    @error('size') is-invalid @enderror" id="size" name="size"
                    value="{{ old('size', $perfume->size) }}">
                @error('size')
                    <div class="">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Price --}}
            <div class="mb-3">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price:</label>
                <input type="number" step="0.01" min="1"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    @error('price') is-invalid @enderror" id="price" name="price"
                    value="{{ old('price', $perfume->price) }}">
                @error('price')
                    <div class="">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Category --}}
            <div class="mb-3 border-2 border-gray-500 rounded-lg p-5">
                <label for="category" class="text-sm font-medium text-gray-900 dark:text-white">Category:</label>
                <select id="category" name="category"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/4 p-2.5 ">
                    <option value=""></option>
                    @foreach ($categories as $category)
                        <option @selected(old('category_id', $perfume->category_id) == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Type --}}
            <div class="mb-3 border-2 border-gray-500 rounded-lg p-5">
                <h5 class="mb-2">Type:</h5>
                <fieldset>
                    @foreach ($types as $type)
                        <div class="flex items-center mb-4">
                            <input id="type-option-{{ $type->id }}" type="radio" name="type"
                                value="{{ $type->id }}"
                                class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600"
                                @checked(old('type', $perfume->type_id) == $type->id)>
                            <label for="type-option-{{ $type->id }}"
                                class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                {{ $type->name }}
                            </label>
                        </div>
                    @endforeach
                </fieldset>
            </div>

            {{-- Description --}}
            <div class="mb-3 border-2 border-gray-500 rounded-lg p-5">
                <label for="description"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description:</label>
                <textarea
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    id="description" rows="3" name="description">{{ old('description', $perfume->description) }}</textarea>
            </div>

            {{-- Image --}}
            <div class="mb-3 border-2 border-gray-500 rounded-lg p-5">
                <label for="image-input" class="block mb-2 text-sm font-medium text-gray-900">Image:</label>
                <input type="file"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none @error('file') is-invalid @enderror"
                    name="image" value="{{ old('file') }}" id="image-input">
                @error('file')
                    <div class="">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <button
                class="w-[150px] h-[70px] bg-blue-200 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                type="submit">Salva</button>
        </form>
        {{-- / FORM BODY --}}

    </div>

    {{-- BACK --}}
    <div>
        <a href="{{ route('admin.perfumes.index') }}"
            class="bg-green-100 hover:bg-green-500 text-dark font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded mt-3">&larr;
            Torna ai prodotti</a>
    </div>
@endsection
