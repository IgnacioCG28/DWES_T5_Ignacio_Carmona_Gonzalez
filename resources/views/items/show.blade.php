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
                        <p>Item Name: {{ $item->name }}</p>
                        <p>Item Description: {{ $item->description }}</p>
                        <p>Item Price: {{ $item->price }}</p>
                        <p>Item Picture:
                            <img src="{{ Storage::url($item->picture) }}" alt="picture" width="300"height="300">
                        </p>
                        <p>Item Box location: {{ $item->ItemBox->label ?? 'Not in box' }}</p>

                        <a href="{{ route('items.index') }}" class="text-blue-500 hover:underline mr-2">Return</a>
                        <a href="{{ route('items.edit', $item) }}"
                            class="text-yellow-500 dark:text-yellow-500 hover:underline mr-2">{{ __('Edit') }}</a>

                        <form method="POST" action="{{ route('items.destroy', $item) }}" class="inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Are you sure?')"
                                class="text-red-500 hover:underline">{{ __('Delete') }}</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
