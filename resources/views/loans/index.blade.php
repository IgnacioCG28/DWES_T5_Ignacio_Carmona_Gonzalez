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

                    <div class="overflow-x-auto">
                        <table class="mx-auto max-w-2xl table-auto min-w-full border text-center">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700">User</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700">Item</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700">Checkout date
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700">Due date</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700">Returned date
                                    </th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700">Return</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loans as $loan)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $loan->loanUser->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $loan->loanItem->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $loan->checkout_date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $loan->due_date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $loan->returned_date ?? 'No returned' }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                @if ($loan->returned_date === null)
                                                <form action="{{ route('loans.update', $loan->id) }}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <x-bt.return-bt/>
                                                </form>
                                                @endif
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
