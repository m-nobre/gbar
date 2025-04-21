<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="my-3">
        <x-label for="category" class="custom-label" value="{{ __('Category') }}" />
        <x-input id="category" class="block mt-1 w-full" type="text" name="category" wire:model.live.debounce.1000ms="category"/>
        @livewire('forms.dynamic-text-input', ['name', 'category', 'name'])
    </div>
</div>
