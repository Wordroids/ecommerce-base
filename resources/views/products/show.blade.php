<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <h3 class="font-semibold text-lg">Product Name</h3>
                        <p class="text-gray-700">{{ $product->name }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="font-semibold text-lg">Slug</h3>
                        <p class="text-gray-700">{{ $product->slug }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="font-semibold text-lg">Price</h3>
                        <p class="text-gray-700">${{ $product->price }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="font-semibold text-lg">Quantity</h3>
                        <p class="text-gray-700">{{ $product->quantity }}</p>
                    </div>

                    <div class="mb-4">
                        <h3 class="font-semibold text-lg">Category</h3>
                        <p class="text-gray-700">{{ $product->category_id }}</p> <!-- You can display category name here if needed -->
                    </div>

                    <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">Edit Product</a>

                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block ml-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Delete Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
