<div class="pt-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg border border-solid border-zinc-100 dark:border-zinc-600 py-8 rounded">
        <div class="grid grid-flow-row auto-rows-max rounded-lg">
            @foreach ($products as $category) 
                <fieldset class="border border-solid border-zinc-100 dark:border-zinc-700 dark:bg-gray-600 p-3 my-1 rounded-md">
                    <legend class="">
                        <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs  ring-1 ring-gray-500/10 ring-inset" style="
                        border-color:{{ App\Helper\Tools::adjustBrightness($category['data']['color'], 0.2) ?? '#666' }};
                        background-color:{{ App\Helper\Tools::adjustBrightness($category['data']['color'], -0.7) ?? '#333' }};
                        color:{{ App\Helper\Tools::adjustBrightness($category['data']['color'], 0.8) ?? '#999' }}">
                            {{$category['data']['name']}}
                        </span>

                    </legend>
                    @foreach ($category as $key => $product)
                        @if ($key != 'data')
                            
                            <div class="flex items-center grid col-span-full grid-cols-4 shadow shadow-b-xs align-middle {{ $loop->iteration % 2 == 0 ? 'bg-gray-50' : 'bg-gray-100' }} box-content rounded-md">
                                <div class=" p-3 pl-3 text-gray-500 dark:border-gray-700 dark:text-gray-600">
                                        <div class="flex flex-row gap-1">
                                            <div class="p-1 border border-gray-400 rounded-full" style="
                                                border-color:{{ App\Helper\Tools::adjustBrightness($category['data']['color'], 0.2) ?? '#666' }};
                                                background-color:{{ App\Helper\Tools::adjustBrightness($category['data']['color'], -0.8) ?? '#666' }};
                                                text-color:{{ App\Helper\Tools::adjustBrightness($category['data']['color'], 0.8) ?? '#666' }}">
    
                                                @if ($product['image'])                                    
                                                    <div class="rounded-full">
                                                        <img class="w-9 h-9 rounded-full" src="{{ $product['image'] }}">
                                                    </div>
                                                @else
                                                    @if (isSet($product['icon']))
                                                        
                                                        <i class="bi {{ $product['icon'] ?? 'bi-question-circle' }}" style="color:{{ $product['color'] ?? '#000' }}"></i>
                                                    @else
                                                        <span class="text-3xl" style="color:{{ $category['data']['color'] ?? '#000' }}">{{ucwords($product['name'][0])}} </span>
                                                        <span class="text-sm -ml-2" style="color:{{ $category['data']['color'] ?? '#000' }}">{{ substr($product['name'], '1')}} </span>
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="mx-1 p-1 text-2xl my-auto">
                                                {{ _($product['name']) }}
                                            </div>
                                        </div>
                                </div>
                                <div class="col-span-2  p-3 pl-3 text-gray-500 dark:border-gray-700 dark:text-gray-400">
                                        {{ _($product['description'] ?? '') }}
                                </div>
                            </div>
                        @endif      
                    @endforeach
                </fieldset>
                @endforeach
          </div>
    </div>
</div>
