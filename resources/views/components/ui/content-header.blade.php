@props([
    'onlyBreadcrumb' => true,
    'title' => 'Dashboard'
])

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

            <div class="col-md-6">
                {{-- Titles--}}
            </div>

            <div class="col-md-6">
                <x-ui.breadcrumb></x-ui.breadcrumb>
            </div>
            
            {{$slot}}

        </div>
    </div>
</div>
