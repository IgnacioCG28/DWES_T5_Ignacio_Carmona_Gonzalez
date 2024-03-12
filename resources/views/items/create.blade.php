<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Item') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <form action="{{ route('items.store') }}" method="POST"
                    class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="name"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Name:</label>
                        <input type="text" name="name" id="name"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>

                    <div class="mb-6">
                        <label for="description"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Description:</label>
                        <input type="text" name="description" id="description"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>

                    <div class="mb-6">
                        <label for="picture"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Pictures:</label>
                        <input type="file" name="picture" id="picture" accept="image/*"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-6">
                        <label for="price"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Price:</label>
                        <input type="text" name="price" id="price"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="button">
                            Create Item
                        </button>

                        <a href="{{ route('items.index') }}"
                            class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
