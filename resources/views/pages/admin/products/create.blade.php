<x-app-layout>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">

        <main class="p-4 md:ml-64 h-auto pt-20">

            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600  mb-4">
               
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <!-- Show Validation Errors -->
                        @if ($errors->any())
                        <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- Product Form -->
                        <form action="{{ route('products.store') }}" method="POST">
                            @csrf

                            <!-- Product Name -->
                            <div class="mb-4">
                                <x-input-label for="name" :value="__('Product Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Slug -->
                            <div class="mb-4">
                                <x-input-label for="slug" :value="__('Slug')" />
                                <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" required />
                                <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                            </div>

                            <!-- SKU -->
                            <div class="mb-4">
                                <x-input-label for="sku" :value="__('SKU')" />
                                <x-text-input id="sku" class="block mt-1 w-full" type="text" name="sku" :value="old('sku')" required />
                                <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                            </div>

                            <!-- Price -->
                            <div class="mb-4">
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price" :value="old('price')" required />
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>

                            <!-- Quantity -->
                            <div class="mb-4">
                                <x-input-label for="quantity" :value="__('Quantity')" />
                                <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" :value="old('quantity')" required />
                                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                            </div>

                            <!-- Category ID -->
                            <div class="mb-4">
                                <x-input-label for="category_id" :value="__('Category')" />
                                <select name="category_id" id="category_id" class="block mt-1 w-full border-gray-300 rounded-lg">
                                    <option value="">{{ __('Select Category') }}</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button>
                                    {{ __('Create') }}
                                </x-primary-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </main>
    </div>
</x-app-layout>