<x-app-layout>

    <div class="antialiased bg-gray-50 dark:bg-gray-900">

        <main class="p-4 md:ml-64 h-auto pt-20">
            <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 mb-4 ">

                <div class="relative overflow-visible bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                    <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                        <div class="flex items-center flex-1 space-x-4">
                            <h5>
                                <span class="text-gray-500">All Products:</span>
                                <span class="dark:text-white">{{ $products->count() }}</span>
                            </h5>
                            <h5>
                                <span class="text-gray-500">Total sales:</span>
                                <span class="dark:text-white">$88.4k</span>
                            </h5>
                        </div>
                        <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                            <a href="{{ route('products.create') }}" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 focus:outline-none dark:focus:ring-blue-800">
                                <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" />
                                </svg>
                                Add new product
                            </a>
                        </div>
                    </div>

                    <div class="overflow-x-auto overflow-y-visible h-screen">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">
                                        <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </th>
                                    <th scope="col" class="px-4 py-3">Product</th>
                                    <th scope="col" class="px-4 py-3">Category</th>
                                    <th scope="col" class="px-4 py-3">Stock</th>
                                    <th scope="col" class="px-4 py-3">Sales/Day</th>
                                    <th scope="col" class="px-4 py-3">Sales/Month</th>
                                    <th scope="col" class="px-4 py-3">Rating</th>
                                    <th scope="col" class="px-4 py-3">Sales</th>
                                    <th scope="col" class="px-4 py-3">Revenue</th>
                                    <th scope="col" class="px-4 py-3">Last Update</th>
                                    <th scope="col" class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-4 py-2">
                                        <input type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </td>
                                    <th scope="row" class="flex items-center px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if(isset($product->assets[0]))
                                            <img src="{{ Storage::url($product->assets[0]->file_path) }}" alt="{{ $product->name }} Image" class="object-cover rounded-full h-8 w-8 mr-3">
                                        @else
                                            <img src="{{ asset('path/to/default/image.jpg') }}" alt="{{ $product->name }} Image" class="w-auto h-8 mr-3 rounded">
                                        @endif
                                        {{ $product->name }}
                                    </th>
                                    <td class="px-4 py-2">
                                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $product->category->name }}</span>
                                    </td>
                                    <td class="px-4 py-2">
                                        <div class="flex items-center">
                                            <div class="inline-block w-3 h-3 mr-2 rounded-full
                                                @if($product->available_quantity > 50)
                                                    bg-green-500
                                                @elseif($product->available_quantity <= 50 && $product->available_quantity > 10)
                                                    bg-yellow-300
                                                @else
                                                    bg-red-500
                                                @endif
                                            "></div>
                                            {{ $product->available_quantity }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-2">-</td>
                                    <td class="px-4 py-2">-</td>
                                    <td class="px-4 py-2">
                                        <div class="flex items-center">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if($i < floor($product->rating ?? 0))
                                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c..."/>
                                                    </svg>
                                                @else
                                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M9.049 2.927c..."/>
                                                    </svg>
                                                @endif
                                            @endfor
                                            <span class="ml-1 text-gray-500 dark:text-gray-400">{{ number_format($product->rating, 1) }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2">-</td>
                                    <td class="px-4 py-2">$-M</td>
                                    <td class="px-4 py-2">{{ $product->updated_at->diffForHumans() }}</td>
                                    <td class="px-4 py-2">
                                        <!-- Flowbite-powered Dropdown -->
                                        <div class="relative z-10">
                                            <button id="dropdownButton-{{ $product->id }}" data-dropdown-toggle="dropdown-{{ $product->id }}" class="inline-flex justify-center w-full rounded-md px-2 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 3a1 1 0 110 2 1 1 0 010-2zM10 9a1 1 0 110 2 1 1 0 010-2zM10 15a1 1 0 110 2 1 1 0 010-2z" />
                                                </svg>
                                            </button>
                                            <!-- Dropdown Menu -->
                                            <div id="dropdown-{{ $product->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-28 dark:bg-gray-700" data-popper-placement="bottom">
                                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownButton-{{ $product->id }}">
                                                    <li>
                                                        <a href="{{ route('products.show', $product->id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('products.edit', $product->id) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="block">
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
        </main>
    </div>

</x-app-layout>
