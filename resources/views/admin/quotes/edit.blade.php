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

                <x-form action="{{ route('quotes.update',['quote' => $quote->id]) }}" method="PUT" id="edit-form">
                    <x-card>
                        <x-slot:header>
                            <h3 class="card-title">Update Quote</h3>
                        </x-slot:header>

                        <x-slot:body>

                            <div class="row">

                                <x-form.select-group name="author_id" label="Author" :options="$authors" col="col-md-6"
                                                     :selected="$quote->author_id"></x-form.select-group>

                                <x-form.select-group
                                    multiple="multiple"
                                    data-placeholder="Select Categories"
                                    col="col-md-6"
                                    name="categories[]"
                                    label="Category"
                                    :selectedValue="$categoryIds"
                                    :options="$categories"
                                    class="select2bs4" style="width: 100%;">
                                </x-form.select-group>

                                <x-form.text-area-group name="quote" label="Quote" :value="$quote->quote"></x-form.text-area-group>
                            </div>

                        </x-slot:body>

                        <x-slot:footer class="text-right">
                            <x-button.submit>Update</x-button.submit>
                        </x-slot:footer>
                    </x-card>
                </x-form>

            </div>

        </div>
    </x-ui.container>
@endsection
@pushonce('custom-js')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\QuoteStoreRequest', '#edit-form'); !!}
@endpushonce
