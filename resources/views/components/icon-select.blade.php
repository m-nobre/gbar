<div class="relative scrollable-y" x-data="{ selected: none }">
  @push('scripts')
      
  <script>
    function selectIcon(icon) {
      alert(icon)
      document.querySelector('#icon').value = icon;
    };
  </script>
  @endpush

  <input type="text"  
  class="w-full aria-disabled:cursor-not-allowed outline-none focus:outline-none text-stone-800 dark:text-white placeholder:text-stone-600/60 ring-transparent border border-stone-200 transition-all ease-in disabled:opacity-50 disabled:pointer-events-none select-none text-sm py-1.5 px-2 ring shadow-sm bg-white rounded-lg duration-100 hover:border-stone-300 hover:ring-none focus:border-stone-400 focus:ring-none peer" id="icon" />

    @if ($icons = json_decode($icons, TRUE))
    <div class="not-prose overflow-auto rounded-lg bg-white outline outline-white/5 dark:bg-gray-950/50 p-8">
      <div class="relative mx-auto flex h-72 max-w-sm flex-col divide-y divide-gray-200 overflow-auto rounded-xl bg-white shadow-lg ring-1 ring-black/5 dark:divide-gray-200/5 dark:bg-gray-800">
        There are {{count($icons)}} categories.
        @foreach ($icons as $category => $values)
            <div class="flex items-center gap-4 p-4 bg-zinc-100 icon-row" id="{{$category}}">
              <i class="bi bi-bookmark-star-fill h-12 w-12 rounded-full"></i>
              <div class="flex flex-col">
                <strong class="text-md font-medium text-gray-900 dark:text-gray-200">{{ucwords($category)}}</strong>
                <span class="text-sm font-medium text-gray-400 dark:text-gray-400">{{count($icons[$category])}}
                  {{__("Items")}}</span>
              </div>
            </div>
            @foreach ($icons[$category] as $icon => $tags)
            <a href="#" onclick="selectIcon('bi-{{$icon}}');">
              <div class="flex items-center gap-4 p-3">
                <i class="bi bi-{{$icon}} h-12 w-12 rounded-full text-3xl mt-3"></i>
                <div class="flex flex-col">
                  <strong class="text-md font-medium text-gray-900 dark:text-gray-200">{{$icon}}</strong>
                  <span class="text-sm font-medium text-gray-400 dark:text-gray-400">{{ucwords($tags)}}</span>
                </div>
              </div>
            </a>
            @endforeach
            @endforeach
          </div>
        </div>
    @endif

</div>