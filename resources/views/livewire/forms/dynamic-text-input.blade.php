<div class="space-y-8 divide-y divide-gray-200"
    x-data='{
        {{ucfirst($model)}}FieldSelected(e) {
            let value = e.target.value
            var $dvElement = $("#{{ucfirst($model)}}FieldOptions");
            if (!$.isEmptyObject($dvElement)) 
            {
                let id = document.body.querySelector("#{{ucfirst($model)}}FieldOptions [value=\""+value+"\"]").dataset.value
        
                $wire.dispatch("{{$model}}-selected", { id: id });
                console.log(id);
            } 
            


            // todo: Do something interesting with this
        }
    }'
>
    <input
        type="text"
        list="{{ucfirst($model)}}FieldOptions"
        wire:model.live.debounce.1000ms="field"
        value="{{$field ?? ''}}"
        class="border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
        x-on:change.debounce="{{ucfirst($model)}}FieldSelected($event)"
    >
    @if ($new)
        <a href="#" wire:click.prevent="save">
            <h6>{{ucfirst($model)}} {{__("is new, please click here to save")}} </h6>
        </a>
    @endif



    <datalist id="{{ucfirst($model)}}fieldOptions">
        @foreach($searchResults as $id => $field)
            <option
                wire:key="{{ $id }}"
                data-value="{{ $id }}"
                value="{{ $field }}"
            ></option>
        @endforeach
    </datalist>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
</div>
