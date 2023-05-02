@extends('layouts.app')

@section('content')

    <x-ui.content-header></x-ui.content-header>

    <x-ui.container>
        <div class="row">
            <div class="col-md-12">

                <x-card>
                    <x-slot:header>
                        <div class="col-md-6">
                            <h3 class="card-title">Titles</h3>
                        </div>
                    </x-slot:header>

                    <x-slot:body class="card-primary">
                        <x-form action="{{route('titles.store')}}" id="title-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <x-form.filepond
                                        label="Choose Files"
                                        name="title_files[]"
                                        multiple
                                        accept="image/*">
                                    </x-form.filepond>
                                </div>
                                <div class="col-md-12 text-right mb-4">
                                    <x-button.submit>Save</x-button.submit>
                                </div>

                                @foreach($titles as $media)
                                    <x-ui.sticker-file-preview :media="$media"></x-ui.sticker-file-preview>
                                @endforeach
                            </div>
                            {{ $titles->links() }}
                        </x-form>
                    </x-slot:body>
                </x-card>

            </div>

        </div>
    </x-ui.container>
@endsection

@push('custom-js')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\TitleStoreRequest', '#title-form'); !!}
@endpush
