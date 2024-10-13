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

                        <!-- Success Message -->
                        @if (session('success'))
                        <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                            {{ session('success') }}
                        </div>
                        @endif

                        <!-- Create Make Form -->
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
                            {{ __('Create Make') }}
                        </h2>

                        <form action="{{ route('makes.store') }}" method="POST">
                            @csrf

                            <!-- Make Name -->
                            <div class="mb-4">
                                <x-input-label for="name" :value="__('Make Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Make Description -->
                            <div class="mb-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" name="description" class="block mt-1 w-full border-gray-300 rounded-lg">{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <!-- Submit Button -->
                            <div class="flex items-center justify-end mt-4">
                                <x-primary-button>
                                    {{ __('Create Make') }}
                                </x-primary-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
