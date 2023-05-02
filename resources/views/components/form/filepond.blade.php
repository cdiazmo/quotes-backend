@pushonce('custom-css')
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css"
          rel="stylesheet"/>
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
          rel="stylesheet">
@endpushonce

<div>
    @if($label)
        <x-form.label name="{{ $name }}" label="{{$label}}" class="col-form-label"></x-form.label>
    @endif

    <input type="file" name="{{$name}}" class="filepond" {{$attributes}} />
</div>

@pushonce('custom-js')
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>
    <script
        src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
    <script
        src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <script>
        const fieldsetElement = document.querySelector('.filepond');

        FilePond.create(fieldsetElement);

        FilePond.setOptions({
            acceptedFileTypes: ['image/png'],
            server: {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                process: '/file-upload',
                files: {{$files}}
            },
        });

        FilePond.registerPlugin(FilePondPluginImagePreview);
        FilePond.registerPlugin(FilePondPluginFilePoster);
        FilePond.registerPlugin(FilePondPluginFileValidateType);
        FilePond.registerPlugin(FilePondPluginFileValidateSize);
    </script>
@endpushonce

