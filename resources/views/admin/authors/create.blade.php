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

                <x-form action="{{ route('authors.store') }}" id="author-form">
                    <x-card>
                        <x-slot:header>
                            <h3 class="card-title">Create Author</h3>
                        </x-slot:header>

                        <x-slot:body>

                            <div class="row">
                                <x-form.input-group
                                    name="name"
                                    label="Name"
                                    placeholder="Enter Name">
                                </x-form.input-group>
                            </div>

                        </x-slot:body>

                        <x-slot:footer class="text-right">
                            <x-button.submit>Save</x-button.submit>
                        </x-slot:footer>
                    </x-card>
                </x-form>

            </div>

        </div>
    </x-ui.container>
@endsection
@pushonce('custom-js')
    {!! JsValidator::formRequest('App\Http\Requests\Admin\AuthorStoreRequest', '#author-form'); !!}
@endpushonce
