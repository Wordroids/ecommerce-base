<x-app-layout>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <main class="p-4 md:ml-64 h-auto pt-20">
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- Product Title and Back Button -->
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $product->name }}</h2>
                            <a href="{{ route('products.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                                Back to Products
                            </a>
                        </div>

                        <!-- Product Image -->
                        <div class="flex items-center justify-center mb-6">
                            @if(isset($product->featuredImage->file_path))
                                <img class="w-auto h-56 rounded" src="{{ Storage::url($product->featuredImage->file_path) }}" alt="{{ $product->name }}">
                            @else
                                <img class="w-auto h-56 rounded" src="{{ asset('path/to/default/image.jpg') }}" alt="{{ $product->name }}">
                            @endif
                        </div>

                        <!-- Product Details -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Product Information</h3>
                                <ul class="space-y-3">
                                    <li class="flex justify-between">
                                        <span class="font-medium text-gray-600 dark:text-gray-300">Product Number:</span>
                                        <span>{{ $product->product_number }}</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="font-medium text-gray-600 dark:text-gray-300">SKU:</span>
                                        <span>{{ $product->sku }}</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="font-medium text-gray-600 dark:text-gray-300">Make:</span>
                                        <span>{{ $product->make->name ?? 'N/A' }}</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="font-medium text-gray-600 dark:text-gray-300">Model:</span>
                                        <span>{{ $product->model->name ?? 'N/A' }}</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="font-medium text-gray-600 dark:text-gray-300">Variant:</span>
                                        <span>{{ $product->variant->name ?? 'N/A' }}</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="font-medium text-gray-600 dark:text-gray-300">Year:</span>
                                        <span>{{ $product->year }}</span>
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Pricing and Stock</h3>
                                <ul class="space-y-3">
                                    <li class="flex justify-between">
                                        <span class="font-medium text-gray-600 dark:text-gray-300">Price:</span>
                                        <span>{{ $product->price }} USD</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="font-medium text-gray-600 dark:text-gray-300">Discounted Price:</span>
                                        <span>{{ $product->discounted_price ?? 'N/A' }} USD</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="font-medium text-gray-600 dark:text-gray-300">Available Quantity:</span>
                                        <span>{{ $product->available_quantity }}</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="font-medium text-gray-600 dark:text-gray-300">Condition:</span>
                                        <span>{{ ucfirst($product->condition) }}</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="font-medium text-gray-600 dark:text-gray-300">Status:</span>
                                        <span class="px-2 py-1 text-xs rounded-lg {{ $product->status === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ ucfirst($product->status) }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Product Description -->
                        <div class="mt-6">
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Description</h3>
                            <p class="text-gray-600 dark:text-gray-300">{{ $product->description }}</p>
                        </div>

                        <!-- Product Short Description -->
                        <div class="mt-6">
                            <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Short Description</h3>
                            <p class="text-gray-600 dark:text-gray-300">{{ $product->short_description }}</p>
                        </div>

                        <!-- Product Actions (Edit/Delete) -->
                        <div class="mt-6 flex space-x-2">
                            <a href="{{ route('products.edit', $product->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">
                                Edit Product
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">
                                    Delete Product
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
