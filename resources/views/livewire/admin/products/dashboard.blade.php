<div class="p-0 m-0 ">
    {{-- PRODUCTS FILE --}}
    <div class="grid col-span-full ">
        <div class="p-0 m-0 border-1 border-solid border-gray-200">
            <div class="grid grid-cols-4 w-full shadow-md align-middle text-left font-medium text-gray-600 dark:border-gray-600 dark:text-gray-200"
                style="background: linear-gradient(0deg, rgba(156, 154, 154, 0.3) 0%, rgba(210,210,210,0.3) 48%, rgba(255,255,255,0.3) 100%);">
                <div class="mt-0 border-r border-b border-gray-200 pt-2 pb-3 pl-3 align-middle bg-none">
                    {{ __('name') }}
                </div>
                <div class="col-span-2 border-r border-b border-gray-200 pt-2 pb-3 pl-3 align-middle bg-none">
                    {{ __('Description') }}
                </div>
                <div class="border-b border-gray-200 pt-2 pl-3 align-middle bg-none">
                    {{ __('Options') }}
                </div>
            </div>
            <div class="col-span-4 w-full mt-0">
                @if (!$editing)

                    <div
                        class="flex items-center grid col-span-full grid-cols-4 shadow shadow-b-xs align-middle box-content">
                        <div class=" p-3 pl-3 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                            <input type="text" wire:model='name' placeholder="{{ _('Product Name') }}"
                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer" />
                        </div>
                        <div class="col-span-2  p-3 pl-3 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                            <input type="text" wire:model='description' placeholder="{{ _('Product Description') }}"
                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer" />
                        </div>
                        <div class=" p-3 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                            <div class="grid grid-cols-3 w-full gap-2">

                                <div class="relative col-span-2 inline-flex gap-1 p-1 box-content">
                                    <select name="category" wire:model="category"
                                        class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-700 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                                        <option value="">{{ __('Category') }}</option>
                                        @foreach (json_decode($categories) as $cat)
                                            <option value="{{ $cat->id }}"
                                                {{ $cat->id == $category ? 'selected' : '' }}>{{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button wire:click="new"
                                    class="aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer text-xl">
                                    <i class="bi bi-floppy-fill" style="color:green;"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endif

                @foreach (json_decode($products) as $product)
                    <div
                        class="flex items-center grid col-span-full grid-cols-4 shadow shadow-b-xs align-middle {{ $loop->iteration % 2 == 0 ? 'bg-neutral-100' : 'bg-white' }} {{ $editing == $product->id ? 'bg-zinc-500' : '' }} box-content">
                        <div class=" p-3 pl-3 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                            @if ($editing == $product->id)
                                <input type="text" wire:model='name' value="{{ _($product->name) }}"
                                    class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-zinc-500 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer" />
                            @else
                                <div class="flex flex-row gap-1">

                                    <div class="mx-1 p-1 px-2 border border-zinc-400 rounded-full">
                                        <img class="w-12 h-12 rounded-full" src="{{ $product->image }}">
                                    </div>
                                    <div class="mx-1 p-1">
                                        {{ _($product->name) }}
                                    </div>

                                </div>
                            @endif
                        </div>
                        <div class="col-span-2  p-3 pl-3 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                            @if ($editing == $product->id)
                                <input type="text" wire:model='description' value="{{ _($product->description) }}"
                                    class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-zic-500 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer" />
                            @else
                                {{ _($product->description ?? 'Not Available.') }}
                            @endif
                        </div>
                        <div class=" p-3 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                            <div class="relative inline-flex gap-1 p-1 m-auto  box-content">
                                @if ($editing && $editing == $product->id)
                                    <button wire:click="save({{ $product->id }})"
                                        class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-2 border border-gray-400 rounded shadow text-center text-xs">
                                        <i class="bi bi-floppy-fill" style="color:green;"></i>
                                    </button>
                                    <button wire:click="cancel({{ $product->id }})"
                                        class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-2 py-1 border border-gray-400 rounded shadow text-center text-xs">
                                        <i class="bi bi-arrow-return-left" style="color:orange;"></i>
                                    </button>
                                @elseif (!$editing || $editing != $product->id)
                                    <button wire:click="edit({{ $product->id }})"
                                        class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-2 border border-gray-400 rounded shadow text-center text-xs">
                                        <i class="bi bi-pencil-square" style="color:blue;"></i>
                                    </button>
                                    <div>
                                        <button
                                            @click.prevent="if (confirm('{{ __('Are you sure?') }}')) $wire.delete({{ $product->id }})"
                                            class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-2 py-1 border border-gray-400 rounded shadow text-center text-xs">
                                            <i class="bi bi-trash" style="color:red;"></i>

                                        </button>
                                    </div>
                                @endif

                            </div>
                        </div>
                        @if ($editing == $product->id)
                            <div class="col-span-full min-h-20 bg-zinc-300 shadow inset-shadow-sm p-3 panel">
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="relative gap-1 p-1 box-content grid grid-cols-1 content-start">
                                        <div>
                                            <label for="category"
                                                class="block text-sm font-medium text-gray-700 custom-label mb-2 text-white">{{ __('Category') }}</label>
                                            <select name="category" wire:model="category"
                                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-700 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                                                @foreach (json_decode($categories) as $cat)
                                                    <option value="{{ $cat->id }}"
                                                        {{ $cat->id == $category ? 'selected' : '' }}>
                                                        {{ $cat->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="relative gap-1 p-1 box-content align-top mt-3">
                                            <div class="grid grid-cols-1 gap-3 mb-3">
                                                <div
                                                    class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                                                    <label class="flex items-center">
                                                        <input type="checkbox" wire:model="featured"
                                                            {{ $product->featured ? 'checked' : '' }}>
                                                        <span
                                                            class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Featured Product') }}</span>
                                                    </label>
                                                </div>
                                            </div>
                                            {{-- Options --}}
                                            <div class="grid grid-cols-1 gap-3 mb-3">

                                                <div
                                                    class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                                                    <label class="flex items-center">
                                                        <span
                                                            class=" text-md text-gray-600 dark:text-gray-400 mb-3">{{ __('New Option') }}</span>

                                                    </label>
                                                    @if ($options_cat)
                                                        <div>

                                                            <select name="optcat" wire:model="optcat"
                                                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                                                                @foreach (json_decode($options_cat) as $cat)
                                                                    <option value="{{ $cat->id }}"
                                                                        {{ $cat->id == $type ? 'selected' : '' }}>
                                                                        {{ $cat->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div
                                                            class="flex items-center grid col-span-full grid-cols-1 shadow shadow-b-xs align-middle box-content">
                                                            <div
                                                                class=" p-3 pl-3 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                                                                <input type="text" wire:model='optname'
                                                                    placeholder="{{ _('Name (ie. " Large Glass")') }}"
                                                                    class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer" />
                                                            </div>
                                                            <div class="col-span-1  p-3 pl-3 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                                                                <input type="text" wire:model='optdesc'
                                                                    placeholder="{{ _('Description (ie. " 500ml")') }}"
                                                                    class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer" />
                                                            </div>
                                                            <div class="grid grid-cols-2  p-3 pl-3 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                                                                <input type="text" wire:model='optprice'
                                                                    placeholder="{{ _('Price') }}"
                                                                    class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-gray-600 placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer" />
                                                                    <button wire:click="newOption"
                                                                        class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-2 border border-gray-400 rounded shadow text-center text-xs">
                                                                        <i class="bi bi-floppy-fill" style="color:green;"></i>
                                                                    </button>
                                                            </div>

                                                        </div>
                                                    @endif
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    {{-- Image --}}
                                    <div class="grid grid-cols-1 w-full gap-3 mb-3 p-1">
                                        <div class="p-0">
                                            <x-label for="image" class="custom-label mb-2"
                                                value="{{ __('Image') }}" />

                                            <div class="w-full relative border-2 border-gray-300 border-dashed rounded-lg p-6 mb-3  bg-slate-50 shadow-lg"
                                                id="dropzone">
                                                <input type="file"
                                                    class="absolute inset-0 w-full h-full opacity-0 z-50"
                                                    wire:model="file" />
                                                <div class="text-center">
                                                    <img class="mx-auto h-12 w-12"
                                                        src="https://www.svgrepo.com/show/357902/image-upload.svg"
                                                        alt="">

                                                    <h3 class="mt-2 text-sm font-medium text-gray-900">
                                                        <label for="file-upload" class="relative cursor-pointer">
                                                            <span>Drag and drop</span>
                                                            <span class="text-indigo-600"> or browse</span>
                                                            <span>to upload</span>
                                                            <input id="file-upload" name="file-upload" type="file"
                                                                class="sr-only">
                                                        </label>
                                                    </h3>
                                                    <p class="mt-1 text-xs text-gray-500">
                                                        PNG, JPG, GIF up to 10MB
                                                    </p>
                                                </div>
                                                @if ($file)
                                                    <div class="auto-cols-auto w-full m-auto">
                                                        <img class="m-auto mt-2" style="max-height:200px;"
                                                            src="{{ $file->temporaryUrl() }}">
                                                    </div>
                                                @endif
                                                @if ($product->image)
                                                    <div class="auto-cols-auto w-full m-auto">
                                                        <img class="m-auto mt-2" style="max-height:200px;"
                                                            src="{{ $product->image }}">
                                                    </div>
                                                @endif

                                            </div>


                                            <div
                                                class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer">
                                                <label class="flex items-center">
                                                    <span
                                                        class=" text-md text-gray-600 dark:text-gray-400 px-3">{{ __('Options') }}</span>
                                                </label>
                                                <div
                                                    class=" p-3 text-gray-500 dark:border-gray-700 dark:text-gray-400 object-contain">
                                                    @foreach (json_decode($options) as $option)
                                                        <div
                                                            class="relative flex items-center grid col-span-full grid-cols-4 shadow shadow-b-xs align-middle {{ $loop->iteration % 2 == 0 ? 'bg-neutral-100' : 'bg-white' }} box-content">
                                                            <div
                                                                class=" col-span-1 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                                                                <div class="flex flex-row gap-1">

                                                                    <div class="mx-1 p-1">
                                                                        {{ _($option->name) }}
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-span-2 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                                                                {{ _($option->description ?? 'Not Available') }}
                                                            </div>
                                                            <div
                                                                class="col-span-1 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                                                                <div class="relative inline-flex gap-1 m-auto ">
                                                                    <button wire:click="edit({{ $option->id }})"
                                                                        class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-2 border border-gray-400 rounded shadow text-center text-xs">
                                                                        <i class="bi bi-pencil-square"
                                                                            style="color:blue;"></i>
                                                                    </button>
                                                                    <div>
                                                                        <button
                                                                            @click.prevent="if (confirm('{{ __('Are you sure?') }}')) $wire.delete({{ $option->id }})"
                                                                            class="bg-white hover:bg-gray-100 text-gray-800 font-semibold px-2 py-1 border border-gray-400 rounded shadow text-center text-xs">
                                                                            <i class="bi bi-trash"
                                                                                style="color:red;"></i>

                                                                        </button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                    </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
