<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{--    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">--}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Krub:wght@400;500;600;700&family=Open+Sans:wght@400;700&family=Poppins:wght@200&family=Radio+Canada:wght@300;400&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css'])
    @stack('custom-css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <x-ui.header></x-ui.header>

    <x-ui.sidebar></x-ui.sidebar>

    <div class="content-wrapper px-3" style="min-height:70vh">
        @yield('content')
    </div>

</div>

{{--<x-modal.delete-modal/>--}}
@include('components.modal.delete-modal')

<script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/adminlte.js') }}"></script>
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>

@vite(['resources/js/app.js'])


<script>
    $(document).ready(function () {
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

        // $(document).on("click", ".btn-delete", function (e) {
        //     e.preventDefault();
        //
        //     // $('#deleteModal').modal('show');
        //
        //     const url = $(this).attr('url');
        //
        //     $('.deleteModalForm').attr('action', url);
        //
        //     $('.btn-delete-modal').attr('disabled', false);
        //
        // });

        $('#deleteModal').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget) // Button that triggered the modal
            // var recipient = button.data('whatever') // Extract info from data-* attributes

            const url = button.attr('url');

            $('.deleteModalForm').attr('action', url);

            $('.btn-delete-modal').attr('disabled', false);

            // var modal = $(this)
        })


        $('#deleteModal').on('hidden.bs.modal', function (e) {
            $('.btn-delete-modal').attr('disabled', true);
        })

        $('.btn-delete-modal').on('click', function () {
            $('.btn-delete-modal').attr('disabled', true);
            $('.deleteModalForm').submit();
        })

    })
</script>

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

@stack('custom-js')

</body>

</html>
