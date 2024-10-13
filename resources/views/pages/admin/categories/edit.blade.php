<x-app-layout>

    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <main class="p-4 md:ml-64 h-auto pt-20">
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900">{{ isset($category) ? 'Edit Category' : 'Create Category' }}</h2>

                        <form method="POST" action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}">
                            @csrf
                            @if(isset($category))
                                @method('PUT')
                            @endif
                            <div class="mt-4">
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Category Name</label>
                                <input type="text" name="name" id="name" value="{{ isset($category) ? $category->name : old('name') }}" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:border-blue-500 focus:ring-blue-500" required>
                            </div>

                            <div class="mt-4">
                                <label for="parent_id" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Parent Category</label>
                                <select name="parent_id" id="parent_id" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">None</option>
                                    @foreach($categories as $parent)
                                        <option value="{{ $parent->id }}" {{ isset($category) && $category->parent_id == $parent->id ? 'selected' : '' }}>
                                            {{ $parent->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-6">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                                    {{ isset($category) ? 'Update Category' : 'Create Category' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

</x-app-layout>
