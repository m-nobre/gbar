<div class="p-0 m-0 ">
    @push('head')
        <link rel="stylesheet" href="{{ asset('resources/css/coloris.css') }}" />
        <script src="{{ asset('resources/js/coloris.js') }}"></script>
    @endpush
    <div class="grid col-span-full ">
        <div class="p-0 m-0 border-1 border-solid border-gray-200">
            <div class="grid grid-cols-4 w-full shadow-md align-middle text-left font-medium text-gray-600 dark:border-gray-600 dark:text-gray-200"
                style="background: linear-gradient(0deg, rgba(156, 154, 154, 0.3) 0%, rgba(210,210,210,0.3) 48%, rgba(255,255,255,0.3) 100%);">
                @if (!$editing)
                    <div class="flex items-center grid col-span-full grid-cols-4 shadow shadow-b-xs align-middle box-content bg-gray-700">
                        <div class=" p-3 pl-3 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                            <input type="text" wire:model='name' placeholder="{{ _('Category Name') }}"
                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer" />
                        </div>
                        <div class="col-span-2  p-3 pl-3 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                            <input type="text" wire:model='description' placeholder="{{ _('Category Description') }}"
                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer" />
                        </div>
                        <div class=" p-3 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                            <div class="grid grid-cols-3 w-full gap-2">

                                <div class="relative col-span-2 inline-flex gap-1 p-1 box-content">
                                    <select name="type" wire:model="type" class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                                        <option value="">{{ __('Category Type') }}</option>
                                        @foreach (json_decode($types) as $cat)
                                            <option value="{{ $cat->id }}" {{ $cat->id == $type ? 'selected' : '' }}>{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button wire:click="new" class="aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer text-xl">
                                    <i class="bi bi-floppy-fill" style="color:green;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="relative col-span-full inline-flex gap-1 p-1 box-content">
                        <select name="filter" wire:model.live="filter" class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                            @foreach (json_decode($types) as $cat)
                                <option value="{{ $cat->id }}" {{ $cat->id == $filter ? 'selected' : '' }}>
                                    {{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <div class="mt-0 border-r border-b border-gray-200 pt-2 pb-3 pl-3 align-middle bg-none">
                    {{ __('Name') }}
                </div>
                <div class="col-span-2 border-r border-b border-gray-200 pt-2 pb-3 pl-3 align-middle bg-none">
                    {{ __('Description') }}
                </div>
                <div class="border-b border-gray-200 pt-2 pl-3 align-middle bg-none">
                    {{ __('Options') }}
                </div>
                @foreach (json_decode($categories) as $category)
                    @if (($filter > 0 && $category->category_type_id == $filter))
                        <div class="flex items-center grid col-span-full grid-cols-4 shadow shadow-b-xs align-middle {{ $loop->iteration % 2 == 0 ? 'bg-neutral-100' : 'bg-white' }} {{ $editing == $category->id ? 'bg-gray-500' : '' }} box-content">
                            <div class=" p-3 pl-3 text-gray-500 dark:border-gray-700 dark:text-gray-600">
                                @if ($editing == $category->id)
                                    <input type="text" wire:model='name' value="{{ _($category->name) }}" class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer" />
                                @else
                                    <div class="flex flex-row gap-1">
                                        <div class="mx-1 p-1 px-2 border border-gray-400 rounded-full" style="
                                            border-color:{{ App\Helper\Tools::adjustBrightness($category->color, 0.2) ?? '#666' }};
                                            background-color:{{ App\Helper\Tools::adjustBrightness($category->color, -0.8) ?? '#666' }}">
                                            <i class="bi {{ $category->icon ?? 'bi-question-circle' }}" style="color:{{ $category->color ?? '#000' }}"></i>
                                        </div>
                                        <div class="mx-1 p-1">
                                            {{ _($category->name) }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-span-2  p-3 pl-3 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                                @if ($editing == $category->id)
                                    <input type="text" wire:model='description' value="{{ _($category->description) }}" class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer" />
                                @else
                                    {{ _($category->description ?? 'Not Available.') }}
                                @endif
                            </div>
                            <div class=" p-3 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                                <div class="relative inline-flex gap-1 p-1 m-auto  box-content">
                                    @if ($editing && $editing == $category->id)
                                        <button wire:click="save({{ $category->id }})" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-2 border border-gray-400 rounded shadow text-center text-xs">
                                            <i class="bi bi-floppy-fill" style="color:green;"></i>
                                        </button>
                                        <button wire:click="cancel({{ $category->id }})" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-2 py-1 border border-gray-400 rounded shadow text-center text-xs">
                                            <i class="bi bi-arrow-return-left" style="color:orange;"></i>
                                        </button>
                                    @elseif (!$editing || $editing != $category->id)
                                        <button wire:click="edit({{ $category->id }})" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-2 border border-gray-400 rounded shadow text-center text-xs">
                                            <i class="bi bi-pencil-square" style="color:blue;"></i>
                                        </button>
                                        <div>
                                            <button @click.prevent="if (confirm('{{ __('Are you sure?') }}')) $wire.delete({{ $category->id }})" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-2 py-1 border border-gray-400 rounded shadow text-center text-xs">
                                                <i class="bi bi-trash" style="color:red;"></i>
                                            </button>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            @if ($editing == $category->id)
                                <div class="col-span-full min-h-20 bg-gray-700 shadow inset-shadow-sm p-3 panel">
                                    <div class="grid grid-cols-2 gap-3">
                                        <div class="relative gap-1 p-1 box-content grid grid-cols-1 content-start">
                                            <div>
                                                <label for="type"
                                                    class="block text-sm font-medium text-gray-700 custom-label mb-2 text-white">{{ __('Category Type') }}</label>
                                                <select name="type" wire:model="type" class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-gray-300 rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                                                    @foreach (json_decode($types) as $cat)
                                                        <option value="{{ $cat->id }}"
                                                            {{ $cat->id == $type ? 'selected' : '' }}>
                                                            {{ $cat->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="relative gap-1 p-1 box-content align-top mt-3">
                                                <label for="type"
                                                    class="block text-sm font-medium text-gray-700 custom-label mb-2 text-white">
                                                    {{ __('Boostrap Icon and Colour') }}
                                                    <a href="https://icons.getbootstrap.com/#icons" target="_blank" rel="noopener noreferrer" class=" text-gray-400 text-xs border border-gray-600 bg-gray-800 hover:border-gray-400 hover:bg-gray-600 rounded-full align-middle p-1 ml-1">
                                                        <i class="bi bi-search -mt-1" style="font-size: 10px;"></i>
                                                    </a>
                                                </label>
                                                <div class="grid grid-cols-2 gap-3">
                                                    <input type="text" wire:model='icon' value="{{ $icon ?? '' }}" class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer" />
                                                    <input type="color" wire:model='color' class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm  px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer min-h-full">
                                                    <div class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                                                        <label class="flex items-center">
                                                            <input type="checkbox" wire:model="standalone"
                                                                {{ $category->standalone ? 'checked' : '' }}>
                                                            <span
                                                                class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Standalone Category') }}</span>
                                                        </label>
                                                    </div>
                                                    <div class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                                                        <label class="flex items-center">
                                                            <input type="checkbox" wire:model="priority"
                                                                {{ $category->priority ? 'checked' : '' }}>
                                                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Category Priority') }}</span>
                                                        </label>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 w-full">
                                            <div class="mb-3">
                                                <x-label for="image" class="custom-label" value="{{ __('Image') }}" />
                                                <div class="w-full relative border-2 border-gray-300 border-dashed rounded-lg p-6 mt-1  bg-slate-50 shadow-lg" id="dropzone">
                                                    <input type="file" class="absolute inset-0 w-full h-full opacity-0 z-50" wire:model="file" />
                                                    <div class="text-center">
                                                        <img class="mx-auto h-12 w-12" src="https://www.svgrepo.com/show/357902/image-upload.svg" alt="">

                                                        <h3 class="mt-2 text-sm font-medium text-gray-900">
                                                            <label for="file-upload" class="relative cursor-pointer">
                                                                <span>Drag and drop</span>
                                                                <span class="text-indigo-600"> or browse</span>
                                                                <span>to upload</span>
                                                                <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                                            </label>
                                                        </h3>
                                                        <p class="mt-1 text-xs text-gray-500">
                                                            PNG, JPG, GIF up to 10MB
                                                        </p>
                                                    </div>
                                                    @if ($file)
                                                        <div class="auto-cols-auto w-full m-auto">
                                                            <img class="m-auto mt-2"style="max-height:200px;"
                                                                src="{{ $file->temporaryUrl() }}">
                                                        </div>
                                                    @endif
                                                    @if ($category->image)
                                                        <div class="auto-cols-auto w-full m-auto">
                                                            <img class="m-auto mt-2"style="max-height:200px;"
                                                                src="{{ $category->image }}">
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <script>
        function adjust(color, amount) {
            return '#' + color.replace(/^#/, '').replace(/../g, color => ('0' + Math.min(255, Math.max(0, parseInt(color,
                16) + amount)).toString(16)).substr(-2));
        }
    </script>
</div>
