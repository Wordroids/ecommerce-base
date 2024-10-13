<x-app-layout>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <main class="p-4 md:ml-64 h-auto pt-20">
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">

                @if(session('success'))
                <div class="bg-green-500 text-white p-4 my-4 rounded">
                    {{ session('success') }}
                </div>
                @endif

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <a href="{{ route('attributes.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">
                            Create Attribute
                        </a>
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr class="bg-gray-800 text-white">
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Parent Attribute</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach($attributes as $attribute)
                                <tr class="border-b">
                                    <td class="px-4 py-2">{{ $attribute->id }}</td>
                                    <td class="px-4 py-2">{{ $attribute->name }}</td>
                                    <td class="px-4 py-2">{{ $attribute->parent ? $attribute->parent->name : 'None' }}</td>
                                    <td class="px-4 py-2 space-x-2">
                                        <div class="relative">
                                            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Actions</button>
                                            <div class="absolute hidden bg-white shadow-md rounded">
                                                <a href="{{ route('attributes.edit', $attribute->id) }}" class="block px-4 py-2 text-gray-700">Edit</a>
                                                <form action="{{ route('attributes.destroy', $attribute->id) }}" method="POST" class="block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700">Delete</button>
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
        </main>
    </div>
</x-app-layout>
