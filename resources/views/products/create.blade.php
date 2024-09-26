<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">Product Name</label>
                            <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-lg p-2" value="{{ old('name') }}">
                        </div>

                        <div class="mb-4">
                            <label for="slug" class="block text-gray-700">Slug</label>
                            <input type="text" name="slug" id="slug" class="w-full border-gray-300 rounded-lg p-2" value="{{ old('slug') }}">
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-gray-700">Price</label>
                            <input type="number" step="0.01" name="price" id="price" class="w-full border-gray-300 rounded-lg p-2" value="{{ old('price') }}">
                        </div>

                        <div class="mb-4">
                            <label for="quantity" class="block text-gray-700">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="w-full border-gray-300 rounded-lg p-2" value="{{ old('quantity') }}">
                        </div>

                        <div class="mb-4">
                            <label for="category_id" class="block text-gray-700">Category</label>
                            <input type="number" name="category_id" id="category_id" class="w-full border-gray-300 rounded-lg p-2" value="{{ old('category_id') }}">
                        </div>

                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
