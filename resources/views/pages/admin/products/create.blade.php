<x-app-layout>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">

        <main class="p-4 md:ml-64 h-auto pt-20">

            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">

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
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <!-- Product Name -->
                            <div class="mb-4">
                                <x-input-label for="name" :value="__('Product Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Product Number -->
                            <div class="mb-4">
                                <x-input-label for="product_number" :value="__('Product Number')" />
                                <x-text-input id="product_number" class="block mt-1 w-full" type="text" name="product_number" :value="old('product_number')" required />
                                <x-input-error :messages="$errors->get('product_number')" class="mt-2" />
                            </div>

                            <!-- SKU -->
                            <div class="mb-4">
                                <x-input-label for="sku" :value="__('SKU')" />
                                <x-text-input id="sku" class="block mt-1 w-full" type="text" name="sku" :value="old('sku')" required />
                                <x-input-error :messages="$errors->get('sku')" class="mt-2" />
                            </div>

                            <!-- Make -->
                            <div class="mb-4">
                                <x-input-label for="make_id" :value="__('Make')" />
                                <select name="make_id" id="make_id" class="block mt-1 w-full border-gray-300 rounded-lg">
                                    <option value="">{{ __('Select Make') }}</option>
                                    @foreach($makes as $make)
                                    <option value="{{ $make->id }}" {{ old('make_id') == $make->id ? 'selected' : '' }}>
                                        {{ $make->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('make_id')" class="mt-2" />
                            </div>

                            <!-- Model -->
                            <div class="mb-4">
                                <x-input-label for="model_id" :value="__('Model')" />
                                <select name="model_id" id="model_id" class="block mt-1 w-full border-gray-300 rounded-lg">
                                    <option value="">{{ __('Select Model') }}</option>
                                    <!-- Models will be populated dynamically based on Make -->
                                </select>
                                <x-input-error :messages="$errors->get('model_id')" class="mt-2" />
                            </div>

                            <!-- Variant -->
                            <div class="mb-4">
                                <x-input-label for="variant_id" :value="__('Variant')" />
                                <select name="variant_id" id="variant_id" class="block mt-1 w-full border-gray-300 rounded-lg">
                                    <option value="">{{ __('Select Variant') }}</option>
                                    <!-- Variants will be populated dynamically based on Model -->
                                </select>
                                <x-input-error :messages="$errors->get('variant_id')" class="mt-2" />
                            </div>
                            <!-- Description -->
                            <div class="mb-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" name="description" class="block mt-1 w-full" required>{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <!-- Short Description -->
                            <div class="mb-4">
                                <x-input-label for="short_description" :value="__('Short Description')" />
                                <textarea id="short_description" name="short_description" class="block mt-1 w-full">{{ old('short_description') }}</textarea>
                                <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
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

                            <!-- Condition -->
                            <div class="mb-4">
                                <x-input-label for="condition" :value="__('Condition')" />
                                <select name="condition" id="condition" class="block mt-1 w-full border-gray-300 rounded-lg">
                                    <option value="new" {{ old('condition') == 'new' ? 'selected' : '' }}>{{ __('New') }}</option>
                                    <option value="used" {{ old('condition') == 'used' ? 'selected' : '' }}>{{ __('Used') }}</option>
                                    <option value="refurbished" {{ old('condition') == 'refurbished' ? 'selected' : '' }}>{{ __('Refurbished') }}</option>
                                </select>
                                <x-input-error :messages="$errors->get('condition')" class="mt-2" />
                            </div>

                            <!-- Status -->
                            <div class="mb-4">
                                <x-input-label for="status" :value="__('Status')" />
                                <select name="status" id="status" class="block mt-1 w-full border-gray-300 rounded-lg">
                                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>{{ __('Available') }}</option>
                                    <option value="out_of_stock" {{ old('status') == 'out_of_stock' ? 'selected' : '' }}>{{ __('Out of Stock') }}</option>
                                    <option value="discontinued" {{ old('status') == 'discontinued' ? 'selected' : '' }}>{{ __('Discontinued') }}</option>
                                </select>
                                <x-input-error :messages="$errors->get('status')" class="mt-2" />
                            </div>

                            <!-- Price -->
                            <div class="mb-4">
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" class="block mt-1 w-full" type="number" step="0.01" name="price" :value="old('price')" required />
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>

                              <!-- Price -->
                              <div class="mb-4">
                                <x-input-label for="year" :value="__('Year')" />
                                <x-text-input id="year" class="block mt-1 w-full" type="number" step="0.01" name="year" :value="old('year')" required />
                                <x-input-error :messages="$errors->get('year')" class="mt-2" />
                            </div>

                            <!-- Discounted Price -->
                            <div class="mb-4">
                                <x-input-label for="discounted_price" :value="__('Discounted Price')" />
                                <x-text-input id="discounted_price" class="block mt-1 w-full" type="number" step="0.01" name="discounted_price" :value="old('discounted_price')" />
                                <x-input-error :messages="$errors->get('discounted_price')" class="mt-2" />
                            </div>

                            <!-- Available Quantity -->
                            <div class="mb-4">
                                <x-input-label for="available_quantity" :value="__('Available Quantity')" />
                                <x-text-input id="available_quantity" class="block mt-1 w-full" type="number" name="available_quantity" :value="old('available_quantity')" required />
                                <x-input-error :messages="$errors->get('available_quantity')" class="mt-2" />
                            </div>
                            <!-- Featured Image -->
                            <div class="mb-4">
                                <x-input-label for="featured_image" :value="__('Featured Image')" />
                                <input type="file" name="featured_image" id="featured_image" class="block mt-1 w-full">
                                <x-input-error :messages="$errors->get('featured_image')" class="mt-2" />
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
    
    <!-- jQuery for AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Fetch models when make is selected
            $('#make_id').on('change', function() {
                var makeId = $(this).val();
                if (makeId) {
                    $.ajax({
                        url: '/get-models/' + makeId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#model_id').empty().append('<option value="">{{ __("Select Model") }}</option>');
                            $.each(data, function(key, value) {
                                $('#model_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                            $('#variant_id').empty().append('<option value="">{{ __("Select Variant") }}</option>'); // Clear variants
                        }
                    });
                } else {
                    $('#model_id').empty();
                    $('#variant_id').empty();
                }
            });

            // Fetch variants when model is selected
            $('#model_id').on('change', function() {
                var modelId = $(this).val();
                if (modelId) {
                    $.ajax({
                        url: '/get-variants/' + modelId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('#variant_id').empty().append('<option value="">{{ __("Select Variant") }}</option>');
                            $.each(data, function(key, value) {
                                $('#variant_id').append('<option value="' + key + '">' + value + '</option>');
                            });
                        }
                    });
                } else {
                    $('#variant_id').empty();
                }
            });
        });
    </script>
</x-app-layout>