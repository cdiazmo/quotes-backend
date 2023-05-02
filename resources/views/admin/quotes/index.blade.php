@extends('layouts.app')

@push('custom-css')
{{--    <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">--}}
@endpush
@section('content')

    <x-ui.content-header></x-ui.content-header>

    <x-ui.container>
        <div class="row">
            <div class="col-md-12">

                <x-card>
                    <x-slot:header>
                        <div class="col-md-6">
                            <h3 class="card-title">Quotes</h3>
                        </div>

                        <div class="col-md-6 text-right">
                            <x-button class="btn-primary" href="{{route('quotes.create')}}">Create Quote</x-button>
                        </div>
                    </x-slot:header>

                    <x-slot:body>
                        {!! $dataTable->table() !!}
                    </x-slot:body>
                </x-card>

            </div>

        </div>
    </x-ui.container>
@endsection

@push('custom-js')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
{{--    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>--}}
{{--    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>--}}
{{--    <script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>--}}
{{--    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>--}}
{{--    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>--}}
{{--    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>--}}
{{--    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>--}}
{{--    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>--}}

{{--    {!! $html->scripts() !!}--}}


       <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
     {{$dataTable->scripts()}}
@endpush
