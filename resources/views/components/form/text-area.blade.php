@php
    $hasTextEditor = str_contains( $attributes->get('class'),'text-editor');
@endphp
<div @if($hasTextEditor) wire:ignore x-data="{}"  x-init="initTextEditor" @endif>
    <textarea
        @if($hasTextEditor) x-ref="textEditor" @endif
        rows="3"
        {{ $attributes->merge(['class' => 'form-control']) }}
        name="{{ $name }}"
        id="{{ $id }}">@if($value){{$value}}@endif</textarea>
</div>

<x-form.error field="{{  $attributes->whereStartsWith('wire:model')->first() }}"></x-form.error>

@if($hasTextEditor)
    @pushonce('custom-css')
        <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
    @endpushonce

    @pushonce('custom-js')
        <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
        <script>
            function initTextEditor() {
                this.textEditor = $(this.$refs.textEditor).summernote({
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link']],
                    ],
                    callbacks: {
                        onChange: function (contents, $editable) {
                            this.dispatchEvent(new Event('input'))
                        }
                    }
                });
            }
        </script>
    @endpushonce
@endif