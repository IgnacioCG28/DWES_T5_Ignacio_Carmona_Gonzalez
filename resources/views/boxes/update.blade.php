<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Box') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <form action="{{ route('boxes.update', $box) }}" method="POST"
                    class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="label"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Label:</label>
                        <x-text-input name="label" value="{{ old('label', $box) }}">
                        </x-text-input>
                    </div>

                    <div class="mb-6">
                        <label for="location"
                            class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Location:</label>
                        <x-text-input name="location" value="{{ old('location', $box) }}">
                        </x-text-input>
                    </div>

                    <div class="flex items-center justify-between">

                        <x-primary-button>
                            Update Box
                        </x-primary-button>
                    </div>
                </form>

                <form action="{{ route('boxes.index') }}">
                    <x-secondary-button>
                        Return
                    </x-secondary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
