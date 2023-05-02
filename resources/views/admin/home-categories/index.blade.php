@extends('layouts.app')

@section('content')

    <x-ui.content-header></x-ui.content-header>

    <x-ui.container>
        <div class="row">
            <div class="col-md-12">

                <x-card>
                    <x-slot:header>
                        <div class="col-md-6">
                            <h3 class="card-title">Home Categories</h3>
                        </div>
                    </x-slot:header>

                    <x-slot:body class="card-primary card-tabs">
                        <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-two-home-tab" data-toggle="pill"
                                   href="#home-category-tab" role="tab" aria-controls="home-category-tab"
                                   aria-selected="true">Home Categories</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="categories-tab" data-toggle="pill"
                                   href="#categories" role="tab" aria-controls="categories"
                                   aria-selected="false">Categories</a>
                            </li>
                        </ul>

                        <div class="card-body px-0">

                            <div class="tab-content" id="custom-tabs-two-tabContent">

                                {{-- Template Tab --}}
                                <div class="tab-pane fade show active" id="home-category-tab" role="tabpanel"
                                     aria-labelledby="home-category-tab-tab">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <x-form.select-group
                                                class="col-md-4 home-category-select"
                                                name="template_id"
                                                :emptyOption="false"
                                                :options="$categories">
                                            </x-form.select-group>

                                            <div class="category-files-dev"></div>
                                        </div>

                                        {{-- Upload Template Images Form --}}
                                        <div class="col-md-4">
                                            <x-form method="post" :action="route('home-categories.store')"
                                                    id="category-form">

                                                <x-form.select-group name="category_id"
                                                                     label="Category"
                                                                     :options="$categories"
                                                                     emptyOptionText="Select Category">
                                                </x-form.select-group>

                                                <x-form.filepond
                                                    label="Choose Files"
                                                    name="category_files[]"
                                                    multiple
                                                    accept="image/*">
                                                </x-form.filepond>

                                                <x-button.submit class="btn-primary text-right mt-3">Upload
                                                </x-button.submit>
                                            </x-form>
                                        </div>
                                    </div>
                                </div>

                                {{-- Categories Tab --}}
                                <div class="tab-pane fade" id="categories" role="tabpanel"
                                     aria-labelledby="categories-tab">
                                    <div class="row">

                                        {{-- Template Categories List  --}}
                                        <div class="col-md-8">
                                            <div class="row">
                                                @forelse($categories as $key=>$category)
                                                    <div class="col-md-4 badge badge-primary py-4 mx-2 mb-3 absolute">
                                                        {{ $category }}

                                                        <x-button
                                                            type="button"
                                                            class="btn-delete"
                                                            data-toggle='modal' data-target='#deleteModal'
                                                            url="{{route('home-categories.destroy',['category'=>$key])}}">
                                                            <span class="fa fa-trash btn-delete-img text-danger"></span>
                                                        </x-button>

                                                    </div>&nbsp;&nbsp;
                                                @empty
                                                    No Data Found
                                                @endforelse
                                            </div>
                                        </div>

                                        {{-- Template Category Form --}}
                                        <div class="col-md-4">
                                            <x-form method="post" :action="route('categories.store')"
                                                    id="home-category-form">

                                                <x-form.input name="type" type="hidden"
                                                              value="{{ \App\Models\Category::HOME_TYPE }}"/>

                                                <x-form.input-group
                                                    name="name"
                                                    label="Name"
                                                    placeholder="Enter Name">
                                                </x-form.input-group>

                                                <div class="col-md-12">
                                                    <x-button.submit class="btn-primary text-right">Save
                                                    </x-button.submit>
                                                </div>
                                            </x-form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-slot:body>
                </x-card>

            </div>

        </div>
    </x-ui.container>
@endsection

@push('custom-js')
    <script>
        $(document).ready(function () {
            const homeCategorySelect = $('.home-category-select');

            getTemplateImages(homeCategorySelect.val());

            homeCategorySelect.change(function (e) {
                getTemplateImages($(this).val())
            });
        });

        function getTemplateImages(categoryId) {
            if (!categoryId) {
                $('.category-files-dev').html('No Data Found.');
                return;
            }

            const url = @js(route('home-categories.index'))+`/${categoryId}`;
            $.get(url, function (data, textStatus, jqXHR) {
                $('.category-files-dev').html(data);
            });
        }
    </script>

    {!! JsValidator::formRequest('App\Http\Requests\Admin\HomeCategoryStoreRequest', '#category-form'); !!}
    {!! JsValidator::formRequest('App\Http\Requests\Admin\CategoryStoreRequest', '#home-category-form'); !!}

@endpush
