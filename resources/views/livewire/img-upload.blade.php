<div>
    {{-- Do your work, then step back. --}}
    <div class="grid grid-cols-1 md:grid-cols-2">
        <div class="mb-3">
            <x-label for="image" class="custom-label" value="{{ __('Image') }}" />

            <div class="w-full relative border-2 border-gray-300 border-dashed rounded-lg p-6 mt-1  bg-slate-50 shadow-lg"
                id="dropzone">
                <input type="file" class="absolute inset-0 w-full h-full opacity-0 z-50"
                    wire:model.live.debounce.1000ms="image" />
                <div class="text-center">
                    <img class="mx-auto h-12 w-12" src="https://www.svgrepo.com/show/357902/image-upload.svg"
                        alt="">

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
                @if ($image)
                    <div class="auto-cols-auto w-full m-auto">
                        <img class="m-auto mt-2"style="max-height:200px;"
                            src="{{ $image->temporaryUrl() }}">
                    </div>
                @endif
                @if ($old_image)
                    <div class="auto-cols-auto w-full m-auto">
                        <img class="m-auto mt-2"style="max-height:200px;"
                            src="{{ $old_image }}">
                    </div>
                @endif

            </div>
            @json($metaData)
            {{-- <div class="w-full px-1 m-0">
                <button type="button" wire:click="savePhoto" class="w-full py-2 px-4 bg-indigo-500 text-white font-semibold rounded-full shadow-md hover:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-400 focus:ring-opacity-75 disabled:bg-slate-50 disabled:text-slate-300 disabled:border-slate-200 rounded-t-lg transition-all hover:shadow-lg " {{!empty($image) ? '' : 'disabled'}}>Save</button>
            </div> --}}

        </div>
    </div>
</div>
