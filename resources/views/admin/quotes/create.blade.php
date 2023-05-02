@extends('layouts.app')

@pushonce('custom-css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endpushonce
@section('content')

    <x-ui.content-header></x-ui.content-header>

    <x-ui.container>
        <div class="row">
            <div class="col-md-12">

                <x-card>
                    <x-slot:header>
                        <h3 class="card-title">Create Quote</h3>
                    </x-slot:header>

                    <x-slot:body>

                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill"
                                   href="#home-category-tab" role="tab" aria-controls="home-category-tab"
                                   aria-selected="true">Create Quote</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="categories-tab" data-toggle="pill"
                                   href="#categories" role="tab" aria-controls="categories"
                                   aria-selected="false">Upload Json Quote</a>
                            </li>
                        </ul>

                        <div class="card-body px-0">

                            <div class="tab-content" id="custom-tabs-two-tabContent">

                                {{-- Create Quote Tab --}}
                                <div class="tab-pane fade show active" id="home-category-tab" role="tabpanel"
                                     aria-labelledby="home-category-tab-tab">
                                    <x-form action="{{ route('quotes.store') }}" id="quote-form">
                                        <div class="row">

                                            <x-form.select-group name="author_id" label="Author" :options="$authors"
                                                                 col="col-md-6"></x-form.select-group>

                                            <x-form.select-group
                                                :emptyOption="false"
                                                multiple="multiple"
                                                data-placeholder="Select Categories"
                                                col="col-md-6" name="categories[]" label="Category"
                                                :options="$categories"
                                                class="select2bs4" style="width: 100%;">
                                            </x-form.select-group>

                                            <x-form.text-area-group name="quote" label="Quote"
                                            ></x-form.text-area-group>

                                            <div class="col-md-12">
                                                <x-button.submit>Save</x-button.submit>
                                            </div>
                                        </div>
                                    </x-form>
                                </div>

                                {{-- Json Quote Tab --}}
                                <div class="tab-pane fade" id="categories" role="tabpanel"
                                     aria-labelledby="categories-tab">
                                    <a class="btn btn-outline-primary" href="{{asset('quotes-json-sample.json')}}"
                                       download="Download Sample File">Download Sample
                                        File</a>
                                    <x-form action="{{ route('upload-json-quotes') }}" has-files
                                            id="json-quotes-form">

                                        <x-form.input-group type="file" accept="application/JSON" name="json_file"
                                                            label="Choose Json File"></x-form.input-group>

                                        <x-button.submit>Upload</x-button.submit>
                                    </x-form>
                                </div>
                            </div>
                        </div>

                    </x-slot:body>

                </x-card>


            </div>

        </div>
    </x-ui.container>
@endsection
@pushonce('custom-js')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\QuoteStoreRequest', '#quote-form'); !!}
    {!! JsValidator::formRequest('App\Http\Requests\Admin\JsonQuotesRequest', '#json-quotes-form'); !!}
@endpushonce
