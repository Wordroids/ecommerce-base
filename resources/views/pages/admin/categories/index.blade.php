<x-app-layout>

    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <main class="p-4 md:ml-64 h-auto pt-20">
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">
                            Create Category
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
                                        <th class="px-4 py-2">Category Name</th>
                                        <th class="px-4 py-2">Parent Category</th>
                                        <th class="px-4 py-2">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700">
                                    @foreach($categories as $category)
                                    <tr class="border-b">
                                        <td class="px-4 py-2">{{ $category->id }}</td>
                                        <td class="px-4 py-2">{{ $category->name }}</td>
                                        <td class="px-4 py-2">{{ $category->parent ? $category->parent->name : 'None' }}</td>
                                        <td class="px-4 py-2 space-x-2">
                                            <a href="{{ route('categories.show', $category->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">View</a>
                                            <a href="{{ route('categories.edit', $category->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-700">Edit</a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Delete</button>
                                            </form>
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
