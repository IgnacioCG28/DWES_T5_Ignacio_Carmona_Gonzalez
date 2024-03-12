<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Item') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <form action="{{ route('items.update', $item) }}" method="POST"
                    class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4" enctype="multipart/form-data">
                    >
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Name:</label>
                        <input type="text" name="name" value="{{ old('name', $item) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-6">
                        <label for="description"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Description:</label>
                        <input type="text" name="description" value="{{ old('description', $item) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-6">
                        <label for="price"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Price:</label>
                        <input type="number" name="price" value="{{ old('price', $item) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-6">
                        <label for="picture"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Picture:</label>
                        <input type="file" name="picture" id="picture"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <img src="{{ Storage::url($item->picture) }}" alt="picture" width="300" height="300">

                    </div>

                    <label for="box_id">Box:</label>

                    <select name="box_id" id="box_id">
                        <option value="{{ null }}">Not in box</option>

                        @foreach ($boxes as $box)
                            <option value="{{ $box->id }}" {{ $item->box_id == $box->id ? 'selected' : '' }}>
                                {{ $box->label }}
                            </option>
                        @endforeach
                    </select>


                    <div class="flex items-center justify-between m-6">
                        <x-primary-button>
                            Update Item
                        </x-primary-button>


                    </div>
                </form>
                <a href="{{ route('items.index') }}"
                    class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Cancel
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
