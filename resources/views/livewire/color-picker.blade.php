<div>
    @push('head')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jscolor/2.5.2/jscolor.min.js"></script>
    @endpush
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <p>
        You can either redirect the color preview:
        <input data-jscolor="{value:'rgba(192,160,255,0.5)', previewElement:'#pr1'}">
    </p>
    <em id="pr1" style="display:inline-block; padding:1em;">previewElement</em>

    <p>
        Or use onInput event handler:
        <input data-jscolor="{value:'rgba(192,160,255,0.5)'}", onInput="update(this.jscolor)">
    </p>
    <em id="pr2" style="display:inline-block; padding:1em;">background</em>
    <em id="pr3" style="display:inline-block; padding:1em;">background color</em>
    @push('scripts')
        <script>
            function update(picker) {
                document.getElementById('pr2').style.background = picker.toBackground();
                document.getElementById('pr3').style.background = picker.toRGBAString();
            }

            jscolor.trigger('input'); // triggers 'onInput' on all color pickers when they are ready
        </script>
    @endpush
</div>
