<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Boxes') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @include('boxes.search')
                    <form action="{{ route('boxes.create') }}" method="GET">
                        @csrf
                        <button type="submit" class="mb-4 px-4 py-2 bg-blue-500 dark:bg-blue-700 text-white rounded focus:outline-none focus:shadow-outline">
                            Create new box
                        </button>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="mx-auto max-w-2xl table-auto min-w-full border text-center">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700">Label</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700">Location</th>
                                    <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($boxes as $box)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $box->label }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $box->location }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            <a href="{{ route('boxes.show', $box) }}" class="text-blue-500 hover:underline mr-2">See</a>
                                            <a href="{{ route('boxes.edit', $box) }}" class="text-yellow-500 dark:text-yellow-500 hover:underline mr-2">{{ __('Edit') }}</a>
                                            
                                            <form method="POST" action="{{ route('boxes.destroy', $box) }}" class="inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-500 hover:underline">{{ __('Delete') }}</button>
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
