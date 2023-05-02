@extends('layouts.app')
@section('content')
    <x-ui.content-header></x-ui.content-header>
    <x-ui.container>
        <div class="row">

            <x-card.stats
                :value="$totalAuthors"
                title="Total Authors"
                bgColor="bg-info"
                link="{{ route('authors.index')  }}">
            </x-card.stats>

            <x-card.stats
                :value="$totalQuotes"
                title="Total Quotes"
                bgColor="bg-success"
                link="{{ route('quotes.index')  }}">
            </x-card.stats>

            <x-card.stats
                :value="$totalCategories"
                title="Total Categories"
                bgColor="bg-warning"
                link="{{ route('categories.index')  }}">
            </x-card.stats>

            <x-card.stats
                :value="$totalHomeCategories"
                title="Total Home Categories"
                bgColor="bg-danger"
                link="{{ route('home-categories.index')  }}">
            </x-card.stats>

            <div class="col-md-12 mt-5">
                <x-card>
                    <x-slot:body>
                        <div class="row">
                            <div class="col-md-6">
                                <canvas id="sales-chart-canvas" height="400" style="height: 400px;"></canvas>
                            </div>

                            <div class="col-md-6">
                                <canvas class="chart" id="line-chart" height="400"
                                        style="height: 400px;"
{{--                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"--}}
                                ></canvas>
                            </div>
                        </div>

                    </x-slot:body>
                </x-card>
            </div>
        </div>
    </x-ui.container>
@endsection

@push('custom-js')
    <script src="{{('plugins/chart.js/Chart.min.js')}}"></script>

    <script>
        $(document).ready(function () {

            var pieChartCanvas = $('#sales-chart-canvas').get(0).getContext('2d')
            var pieData = {
                labels: [
                    'Authors',
                    'Quotes',
                    'Categories',
                    'Home Categories',
                ],
                datasets: [
                    {
                        data: ["{{ $totalAuthors }}", "{{ $totalQuotes }}", "{{ $totalCategories }}", "{{$totalHomeCategories}}"],
                        backgroundColor: ['#17A2B8', '#28A745', '#FFC107', '#DC3545']
                    }
                ]
            }
            var pieOptions = {
                legend: {
                    display: true,
                    position: 'bottom'
                },
                maintainAspectRatio: false,
                responsive: true
            }
            // Create pie or  doughnut chart
            var pieChart = new Chart(pieChartCanvas, {
                type: 'doughnut',
                data: pieData,
                options: pieOptions
            })

            //   Line Chart
            var statsBarChartCanvas = $('#line-chart').get(0).getContext('2d')

            var statsBarChartData = {
                labels: ['Authors', 'Quotes', 'Categories', 'Home Categories'],
                datasets: [
                    {
                        type: 'bar',
                        label: '',
                        borderColor: "#17A2B8",
                        backgroundColor: "#FFB1C1",
                        stack: 'combined',
                        data: ["{{ $totalAuthors }}", "{{ $totalQuotes }}", "{{ $totalCategories }}", "{{$totalHomeCategories}}"]
                    }
                ]
            }

            var statsBarChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false,
                    position: 'bottom'
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            fontColor: '#1F2D3D'
                        },
                        gridLines: {
                            display: false,
                            color: '#1F2D3D',
                            drawBorder: false
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 5000,
                            fontColor: '#1F2D3D'
                        },
                        gridLines: {
                            display: true,
                            color: '#1F2D3D',
                            drawBorder: false
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            // eslint-disable-next-line no-unused-vars
            var statsBarChart = new Chart(statsBarChartCanvas, { // lgtm[js/unused-local-variable]
                type: 'line',
                data: statsBarChartData,
                options: statsBarChartOptions
            });
        });
    </script>
@endpush
