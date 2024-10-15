<x-app-layout>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <main class="p-4 md:ml-64 h-auto pt-20">
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <a href="{{ route('models.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">
                            Create Model
                        </a>

                        @if(session('success'))
                        <div class="bg-green-500 text-white p-4 my-4 rounded">
                            {{ session('success') }}
                        </div>
                        @endif

                        <div class="overflow-x-auto h-screen">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr class="bg-gray-800 text-white">
                                        <th class="px-4 py-2">ID</th>
                                        <th class="px-4 py-2">Model Name</th>
                                        <th class="px-4 py-2">Make</th>
                                        <th class="px-4 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach($models as $model)
                                    <tr class="border-b">
                                        <td class="px-4 py-2">{{ $model->id }}</td>
                                        <td class="px-4 py-2">{{ $model->name }}</td>
                                        <td class="px-4 py-2">{{ $model->make->name }}</td>
                                        <td class="px-4 py-2">
                                            <div class="relative inline-block text-left">
                                                <!-- Dropdown button -->
                                                <button id="dropdownButton{{ $model->id }}" data-dropdown-toggle="dropdown{{ $model->id }}" class="inline-flex justify-center w-full rounded-md px-2 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 3a1 1 0 110 2 1 1 0 010-2zM10 9a1 1 0 110 2 1 1 0 010-2zM10 15a1 1 0 110 2 1 1 0 010-2z" />
                                                    </svg>
                                                </button>

                                                <!-- Flowbite dropdown -->
                                                <div id="dropdown{{ $model->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-28">
                                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownButton{{ $model->id }}">
                                                        <li>
                                                            <a href="{{ route('models.edit', $model->id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                        </li>
                                                        <li>
                                                            <form action="{{ route('models.destroy', $model->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</button>
                                                            </form>
                                                        </li>
                                                    </ul>
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

    <!-- Flowbite script if not already included in your layout -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>
</x-app-layout>
