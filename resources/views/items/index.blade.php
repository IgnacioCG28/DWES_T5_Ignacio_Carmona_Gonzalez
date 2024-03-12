<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('items.search')

                    <form action="{{ route('items.create') }}" method="GET">
                        @csrf
                        <button type="submit"
                            class="mb-4 px-4 py-2 bg-blue-500 dark:bg-blue-700 text-white rounded focus:outline-none focus:shadow-outline">
                            Create new Item
                        </button>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="mx-auto max-w-2xl table-auto min-w-full border text-center">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700">Name</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700">Location</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700">Picture</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $item->ItemBox->label ?? 'Not in Box' }}</td>
                                        <td> <img src="{{ Storage::url($item->picture) }}" alt="picture"
                                                width="100"height="100"> </td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
