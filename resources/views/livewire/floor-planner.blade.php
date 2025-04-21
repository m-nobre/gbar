<div>

    
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="w-full grid-rows-auto p-3">
        <div class="w-full m-auto text-center">
            <button wire:click="newtable" class="relative inline-flex items-center justify-center p-4 px-5 py-3 overflow-hidden font-medium text-indigo-600 transition duration-300 ease-out rounded-full shadow-xl group hover:ring-1 hover:ring-purple-500">
                <span class="absolute inset-0 w-full h-full bg-gradient-to-br from-blue-600 via-purple-600 to-pink-700"></span>
                <span class="absolute bottom-0 right-0 block w-64 h-64 mb-32 mr-4 transition duration-500 origin-bottom-left transform rotate-45 translate-x-24 bg-pink-500 rounded-full opacity-30 group-hover:rotate-90 ease"></span>
                <span class="relative text-white">{{__("Create Table")}}</span>
            </button>
        </div>
        <div class="">
            <div class="resizable" style="border-radius: calc(infinity * 1px)">
                <p>Table</p>
              </div>
            @foreach ($tables as $table)
                <div class="text-center m-3 p-3">
                    <div class="absolute resizable" style="border-radius: calc(infinity * 1px)">
                        <p>{{$table['value']}}</p>
                      </div>
                </div>
            @endforeach
        </div>


    </div>
    <script src="https://unpkg.com/interactjs/dist/interact.min.js"></script>

    <script>
        $(function() {
            const position = { x: 0, y: 0 }

            interact('.resizable')
            .resizable({
                edges: { top: true, left: true, bottom: true, right: true },
                listeners: {
                move: function (event) {
                    let { x, y } = event.target.dataset

                    x = (parseFloat(x) || 0) + event.deltaRect.left
                    y = (parseFloat(y) || 0) + event.deltaRect.top

                    Object.assign(event.target.style, {
                    width: `${event.rect.width}px`,
                    height: `${event.rect.height}px`,
                    transform: `translate(${x}px, ${y}px)`
                    })

                    Object.assign(event.target.dataset, { x, y })
                }
                }
            })
            .draggable({
            listeners: {
                start (event) {
                console.log(event.type, event.target)
                },
                move (event) {
                position.x += event.dx
                position.y += event.dy

                event.target.style.transform =
                    `translate(${position.x}px, ${position.y}px)`
                },
            }
            })
        });
    </script>
</div>
