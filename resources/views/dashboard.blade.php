<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg border border-solid border-zinc-300 py-8">
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight mb-4">
                        {{ __('Categories') }}
                    </h3>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg border border-solid border-zinc-300">
                        @livewire('admin.categories.dashboard')
                    </div>
                </div>
                <div>
                    <h3 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight mb-4">
                        {{ __('Products') }}
                    </h3>
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg border border-solid border-zinc-300">        
                        @livewire('admin.products.dashboard')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
