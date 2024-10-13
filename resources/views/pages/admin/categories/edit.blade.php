<x-app-layout>

    <div class="antialiased bg-gray-50 dark:bg-gray-900">

        <main class="p-4 md:ml-64 h-auto pt-20">

            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4">

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Edit Category
                        </h2>

                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mt-4">
                                <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                                <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                            </div>

                            <div class="mt-4">
                                <label for="slug" class="block font-medium text-sm text-gray-700">Slug</label>
                                <input type="text" name="slug" id="slug" value="{{ $category->slug }}" class="form-input rounded-md shadow-sm mt-1 block w-full">
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </main>
    </div>

</x-app-layout>
