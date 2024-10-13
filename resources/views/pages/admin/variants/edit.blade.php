<x-app-layout>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <main class="p-4 md:ml-64 h-auto pt-20">
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        @if ($errors->any())
                        <div class="bg-red-500 text-white p-4 rounded-lg mb-6">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form action="{{ route('variants.update', $variant->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <x-input-label for="name" :value="__('Variant Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $variant->name }}" required />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="model_id" :value="__('Select Model')" />
                                <select id="model_id" name="model_id" class="block mt-1 w-full border-gray-300 rounded-lg">
                                    @foreach($models as $model)
                                    <option value="{{ $model->id }}" {{ $variant->model_id == $model->id ? 'selected' : '' }}>
                                        {{ $model->name }} ({{ $model->make->name }})
                                    </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('model_id')" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" name="description" class="block mt-1 w-full">{{ $variant->description }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button>{{ __('Update Variant') }}</x-primary-button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
