<x-app-layout>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <main class="p-4 md:ml-64 h-auto pt-20">
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <a href="{{ route('variants.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">
                            Create Variant
                        </a>

                        @if(session('success'))
                        <div class="bg-green-500 text-white p-4 my-4 rounded">
                            {{ session('success') }}
                        </div>
                        @endif

                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr class="bg-gray-800 text-white">
                                        <th class="px-4 py-2">ID</th>
                                        <th class="px-4 py-2">Variant Name</th>
                                        <th class="px-4 py-2">Model</th>
                                        <th class="px-4 py-2">Make</th>
                                        <th class="px-4 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach($variants as $variant)
                                    <tr class="border-b">
                                        <td class="px-4 py-2">{{ $variant->id }}</td>
                                        <td class="px-4 py-2">{{ $variant->name }}</td>
                                        <td class="px-4 py-2">{{ $variant->model->name }}</td>
                                        <td class="px-4 py-2">{{ $variant->model->make->name }}</td>
                                        <td class="px-4 py-2">
                                            <div class="relative inline-block text-left">
                                                <button type="button" class="inline-flex justify-center w-full rounded-md px-2 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 3a1 1 0 110 2 1 1 0 010-2zM10 9a1 1 0 110 2 1 1 0 010-2zM10 15a1 1 0 110 2 1 1 0 010-2z" />
                                                    </svg>
                                                </button>
                                                <div class="absolute z-50 bg-white shadow-md rounded-lg mt-2">
                                                    <a href="{{ route('variants.edit', $variant->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit</a>
                                                    <form action="{{ route('variants.destroy', $variant->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>
