<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Loan') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <form action="{{ route('loans.store') }}" method="POST"
                    class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    @method('POST')
                    <div class="mb-4">
                        <h3 class="text-white uppercase" id="item_id">Item: {{ $item->name }} {{$item->id}}</h3>
                        <input type="hidden" name="item_id" id="item_id" value="{{ $item->id }}">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    </div>

                    <div class="mb-6">
                        <label for="due_date"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Estimated return
                            date:</label>
                        <input type="date" name="due_date" id="due_date"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="button">
                            Create Loan
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
