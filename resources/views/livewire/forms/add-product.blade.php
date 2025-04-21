<div class="pt-4 bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
        
        <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg prose dark:prose-invert">
            <div>
                {{ __('Add Product') }}
            </div>
            @livewire('forms.modal-button', ['model' => 'Category', 'element' => 'category_id' ,'view' => 'forms.partials.create-entity', 'type' => 'livewire', 'icon' => 'bi-plus-square', 'colour' => 'limegreen', 'parent' => $parent, 'label' => 'Product Category']) {{-- https://icons.getbootstrap.com/ --}}
            @livewire('img-upload')
            @livewire('color-picker')


        </div>
    </div>
</div>

