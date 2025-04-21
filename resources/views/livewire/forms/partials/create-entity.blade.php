<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="w-full m-auto mb-3">
        <h3>New {{$model}}</h3>
    </div>
    <form id="{{$key}}">        
        @if ($fieldset)
            @foreach ($fieldset as $field_name => $field_data)
                <div class="col-span-6 sm:col-span-4 mb-3">
                    @if (trim(strtolower($field_data['type'])) === "boolean")
                        <label class="flex items-center">
                            <x-checkbox id="{{$field_name}}" name="{{$field_name}}"/>
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __($field_data['label'] ?? ucfirst($field_name)) }}</span>
                        </label>
                    @else
                    
                        <x-label for="{{$field_name}}" value="{{ __($field_data['label'] ?? ucfirst($field_name)) }}" />
                
                        <x-input id="{{$field_name}}" type="text" class="mt-1 block w-full"/>
                        <x-input-error for="{{$field_name}}" class="mt-2" />
                    @endif
                </div>
            @endforeach
            @livewire('img-upload')
    
        @else
            <div class="mb-3">
                <x-label for="name" class="custom-label" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name"  wire:model="name"/>
            </div>
            <div class="mb-3">
                <x-label for="description" class="custom-label" value="{{ __('Description') }}" />
                <x-input id="description" class="block mt-1 w-full" type="text" name="description"  wire:model="description"/>
            </div>
        @endif
        
        <div class="mb-3">        
            <button id="{{$key}}-submit" class="w-full py-2 px-5 bg-indigo-500 text-white font-semibold rounded-full shadow-md hover:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-400 focus:ring-opacity-75">Save</button>

        </div>
    </form>

    <script>
        const formElem = document.querySelector("#{{$key}}");
        var inputs, index;

        inputs = formElem.getElementsByTagName('input');
        for (index = 0; index < inputs.length; ++index) {
            // deal with inputs[index] element.
            console.log(inputs[index].name +": "+ inputs[index].value);
        }
        // formElem.addEventListener("submit", (e) => {
        //     // on form submission, prevent default
        //     e.preventDefault();

        //     // construct a FormData object, which fires the formdata event
        //     new FormData(formElem);
        // });
        // formElem.addEventListener("formdata", (e) => {
        //     console.log("formdata fired");

        //     // Get the form data from the event object
        //     const data = e.formData;
        //     for (const value of data.values()) {
        //         console.log(value);
        //         console.log(inputs);
        //     }

        //     // Submit the data via fetch()
        //     // fetch("/formHandler", {
        //     //     method: "POST",
        //     //     body: data,
        //     // });
        // });
    </script>

        {{-- <script>
            const form = document.querySelector("#{{$key}}");

            async function sendData() {
                // Associate the FormData object with the form element
                const formData = new FormData(form);
                console.log(formData);

                try {
                    var object = {};
                    formData.forEach((value, key) => {
                        // Reflect.has in favor of: object.hasOwnProperty(key)
                        if(!Reflect.has(object, key)){
                            object[key] = value;
                            return;
                        }
                        if(!Array.isArray(object[key])){
                            object[key] = [object[key]];    
                        }
                        object[key].push(value);
                    });
                    var json = JSON.stringify(object);
                    console.log(json);
                    $wire.dispatch('entity-created', {"data": json});
                } catch (e) {
                    console.error(e);
                }
            }

            const submitbtn = document.querySelector("#{{$key}}-submit");

            submitbtn.addEventListener("click", (event) => {
                
                event.preventDefault();
                sendData();
            });
        </script> --}}
    
</div>
