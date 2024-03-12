<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Box Details') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Items of {{ $box->label }}</h3>
                    <h3 class="text-lg font-semibold mb-4">Location: {{ $box->location }}</h3>


                    <div class="overflow-x-auto">
                        <table class="mx-auto max-w-2xl table-auto min-w-full border text-center">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700">Name</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700">Box</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($items && $items->count() > 0)
                                    @foreach ($items as $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">{{ $box->label }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <a href="{{ route('items.show', $item) }}"
                                                    class="text-blue-500 hover:underline mr-2">See</a>
                                                <a href="{{ route('items.edit', $item) }}"
                                                    class="text-yellow-500 dark:text-yellow-500 hover:underline mr-2">{{ __('Edit') }}</a>
                                                    @if ($item->itemLoan()->whereNull('returned_date')->first())
                                                <a href="{{ route('loans.index') }}"
                                                    class="text-orange-500 dark:text-orange-500 hover:underline mr-2">{{ __('See Loan') }}</a>
                                            @else
                                                <a href="{{ route('loans.create', ['id' => $item->id]) }}"
                                                    class="text-green-500 dark:text-green-500 hover:underline mr-2">{{ __('Loan') }}</a>
                                            @endif

                                                <form method="POST" action="{{ route('items.destroy', $item) }}"
                                                    class="inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                                        class="text-red-500 hover:underline">{{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-gray-300">No items found in this box.</p>
                        @endif



                    </div>
                    <button onclick="window.location='{{ route('boxes.index') }}'"
                        class="bg-gray-400 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Return
                    </button>

                    <button onclick="window.location='{{ route('boxes.edit', $box) }}'"
                        class="bg-yellow-600 hover:bg-yellow-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Edit Box
                    </button>


                    <form method="POST" action="{{ route('boxes.destroy', $box) }}" class="inline">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Are you sure?')"
                            class="bg-red-600 hover:bg-red-400 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            {{ __('Delete') }}
                        </button>
                    </form>

                </div>

            </div>
        </div>
</x-app-layout>
