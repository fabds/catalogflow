@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-12">
                                <div class="numbers">
                                    <p class="card-category font-weight-bold">Progetti</p>
                                    <p class="card-title"><strong class="text-info">{{$stats["all_projects"]->count()}}</strong></p>
                                    <p class="card-category font-italic">Totali</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{url("/projects")}}" class="nav-link text-dark"><i class="fa fa-briefcase"></i> Progetti</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-12">
                                <div class="numbers">
                                    <p class="card-category font-weight-bold">Progetti</p>
                                    <p class="card-title"><strong class="text-success">{{$stats["active_projects"]->count()}}</strong></p>
                                    <p class="card-category font-italic">Attivi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{url("/projects")}}" class="nav-link text-dark"><i class="fa fa-briefcase"></i> Progetti</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-12">
                                <div class="numbers">
                                    <p class="card-category font-weight-bold">Progetti</p>
                                    <p class="card-title"><strong class="text-danger">{{$stats["inactive_projects"]->count()}}</strong></p>
                                    <p class="card-category font-italic">Non Attivi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{url("/projects")}}" class="nav-link text-dark"><i class="fa fa-briefcase"></i> Progetti</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-12">
                                <div class="numbers">
                                    <p class="card-category font-weight-bold">Jobs</p>
                                    <p class="card-title"><strong class="text-info">{{$stats["to_process_jobs"]->count()}}</strong></p>
                                    <p class="card-category font-italic">Da Processare</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{url("/jobs")}}" class="nav-link text-dark"><i class="fa fa-list"></i> Jobs</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-12">
                                <div class="numbers">
                                    <p class="card-category font-weight-bold">Jobs</p>
                                    <p class="card-title"><strong class="text-success">{{$stats["processed_jobs"]->count()}}</strong></p>
                                    <p class="card-category font-italic">Processati</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{url("/jobs")}}" class="nav-link text-dark"><i class="fa fa-list"></i> Jobs</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-12">
                                <div class="numbers">
                                    <p class="card-category font-weight-bold">Jobs</p>
                                    <p class="card-title"><strong class="text-danger">{{$stats["error_jobs"]->count()}}</strong></p>
                                    <p class="card-category font-italic">In Errore</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <a href="{{url("/jobs")}}" class="nav-link text-dark"><i class="fa fa-list"></i> Jobs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-title">Jobs per brand</h5>
                        <p class="card-category"></p>
                    </div>
                    <div class="card-body">
                        <canvas id="chartJobsPerProjects" width="400" height="100"></canvas>
                    </div>
                    <div class="card-footer">
                        <div class="chart-legend">
                            <i class="fa fa-circle text-primary"></i> Job Totali
                            <i class="fa fa-circle text-success"></i> Job Processati
                            <i class="fa fa-circle text-danger"></i> Job In Errore
                        </div>
                        <hr />
                        <div class="card-stats">
                            <a href="{{url("/jobs")}}" class="nav-link text-dark"><i class="fa fa-list"></i> Jobs</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Jobs Statistics</h5>
                        <p class="card-category">Jobs</p>
                    </div>
                    <div class="card-body ">
                        <canvas id="chartJobs"></canvas>
                    </div>
                    <div class="card-footer ">
                        <div class="legend">
                            <i class="fa fa-circle text-primary"></i> Da Processare
                            <i class="fa fa-circle text-success"></i> Processati
                            <i class="fa fa-circle text-warning"></i> Bloccati
                            <i class="fa fa-circle text-danger"></i> Errore
                        </div>
                        <hr>
                        <div class="stats">
                            <a href="{{url("/jobs")}}" class="nav-link text-dark"><i class="fa fa-list"></i> Jobs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            //demo.initChartsPages();

            ctx = document.getElementById('chartJobs').getContext("2d");

            myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["Da Processare", "Processati", "Bloccati", "In Errore"],
                    datasets: [{
                        label: "Jobs",
                        pointRadius: 0,
                        pointHoverRadius: 0,
                        backgroundColor: [
                            '#50CBCE',
                            '#6BD098',
                            '#FBC658',
                            '#EF8157'
                        ],
                        borderWidth: 0,
                        data: [{{$stats["to_process_jobs"]->count()}}, {{$stats["processed_jobs"]->count()}}, {{$stats["stucked_jobs"]->count()}}, {{$stats["error_jobs"]->count()}}]
                    }]
                },

                options: {

                    legend: {
                        display: false
                    },

                    pieceLabel: {
                        render: 'percentage',
                        fontColor: ['white'],
                        precision: 2
                    },

                    tooltips: {
                        enabled: true
                    },

                    scales: {
                        yAxes: [{

                            ticks: {
                                display: false
                            },
                            gridLines: {
                                drawBorder: false,
                                zeroLineColor: "transparent",
                                color: 'rgba(255,255,255,0.05)'
                            }

                        }],

                        xAxes: [{
                            barPercentage: 1.6,
                            gridLines: {
                                drawBorder: false,
                                color: 'rgba(255,255,255,0.1)',
                                zeroLineColor: "transparent"
                            },
                            ticks: {
                                display: false,
                            }
                        }]
                    },
                }
            });



            <?php
            $totalNums = [];
            $successNums = [];
            $errorNums = [];
            $totalProjects = [];

            foreach ($stats['jobs_per_brand'] as $key => $val) {
                $totalNums[] = $val['total'];
                $successNums[] = $val['success'];
                $errorNums[] = $val['error'];
                $totalProjects[] = $key;
            }
            ?>

            var barChartData = {
                labels: ["{!!implode('","',$totalProjects)!!}"],
                datasets: [{
                    label: 'Job Totali',
                    backgroundColor: "#50CBCE",
                    stack: "total",
                    data: [
                        {{implode(',',$totalNums)}}
                    ]
                }, {
                    label: 'Job Processati',
                    backgroundColor: '#6BD098',
                    stack: "partial",
                    data: [
                        {{implode(',',$successNums)}}
                    ]
                }, {
                    label: 'Job In Errore',
                    backgroundColor: '#EF8157',
                    stack: "partial",
                    data: [
                        {{implode(',',$errorNums)}}
                    ]
                }]

            };

            chartJobsPerProjects = document.getElementById('chartJobsPerProjects').getContext('2d');
            myBar = new Chart(chartJobsPerProjects, {
                type: 'bar',
                data: barChartData,
                options: {
                    title: {
                        display: false,
                        text: 'Jobs per brand'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                        }],
                        yAxes: [{
                            stacked: true
                        }]
                    },
                    legend: {
                        display: false
                    },
                }
            });


        });
    </script>
@endpush
