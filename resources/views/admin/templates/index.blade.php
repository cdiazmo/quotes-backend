@extends('layouts.app')

@section('content')

    <x-ui.content-header></x-ui.content-header>

    <x-ui.container>
        <div class="row">
            <div class="col-md-12">

                <x-card>
                    <x-slot:header>
                        <div class="col-md-6">
                            <h3 class="card-title">Templates</h3>
                        </div>
                    </x-slot:header>

                    <x-slot:body class="card-primary">
                        <x-form action="{{route('templates.store')}}" id="templates-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <x-form.filepond
                                        label="Choose Templates"
                                        name="templates[]"
                                        multiple
                                        accept="image/*">
                                    </x-form.filepond>
                                </div>
                                <div class="col-md-12 text-right mb-4">
                                    <x-button.submit>Save</x-button.submit>
                                </div>

                                @foreach($templates as $media)
                                    <x-ui.media-file-preview :media="$media" col="col-md-2"></x-ui.media-file-preview>
                                @endforeach
                            </div>
                            {{ $templates->links() }}
                        </x-form>
                    </x-slot:body>
                </x-card>

            </div>

        </div>
    </x-ui.container>
@endsection

@push('custom-js')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\TemplateStoreRequest', '#templates-form'); !!}
@endpush
