<x-main-layout>
    @push('head')
        <style>
            .resizable {
                width: 120px;
                border-radius: 0.75rem;
                padding: 20px;
                margin: 1rem;
                background-color: #29e;
                color: white;
                font-size: 20px;
                font-family: sans-serif;
                overflow: hidden;

                touch-action: none;

                /* This makes things *much* easier */
                box-sizing: border-box;
            }
        </style>
    @endpush
    <div class="bg-gray-100 dark:bg-gray-900 h-screen">
        @livewire('public.widgets.menu-listing')
    </div>
</x-main-layout>