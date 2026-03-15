@extends('layouts.app')

@section('content')
<div class="content-page">
    <div class="content">
    <div class="container-fluid">
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            <div class="row">
                <div class="col-xl-3 col-sm-6">
                    <div class="card" style="color: #fff;background:rgb(34, 43, 74)">
                        <div class="card-body widget-style-1">
                            <div class="text-white media">

                                <div class="media-body align-self-center">
                                    <h2 class="my-0 text-white"><span data-plugin="counterup">{{number_format($activeusers)}}</span></h2>
                                    <p class="mb-0">Total users</p>
                                </div>

                                <i class="ion ion-md-people"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card" style="color: #fff;background:rgb(34, 43, 74)">
                        <div class="card-body widget-style-1">
                            <div class="text-white media">

                                <div class="media-body align-self-center">
                                    <h2 class="my-0 text-white"><span data-plugin="counterup">{{number_format($completedWillsCount)}}</span></h2>
                                    <p class="mb-0">Users with completed wills</p>
                                </div>

                                <i class="mdi mdi-cash"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card" style="color: #fff;background:rgb(34, 43, 74)">
                        <div class="card-body widget-style-1">
                            <div class="text-white media">

                                <div class="media-body align-self-center">
                                    <h2 class="my-0 text-white"><span data-plugin="counterup">{{number_format($totalfaq)}}</span></h2>
                                    <p class="mb-0">Total FAQ</p>
                                </div>

                                <i class="fa fa-question-circle"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card" style="color: #fff;background:rgb(34, 43, 74)">
                        <div class="card-body widget-style-1">
                            <div class="text-white media">

                                <div class="media-body align-self-center">
                                    <h2 class="my-0 text-white"><span data-plugin="counterup">{{number_format($totalbase)}}</span></h2>
                                    <p class="mb-0">Total Knowledge Base</p>
                                </div>

                                <i class="mdi mdi-coins"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">

                        <div class="card-body">
                            <div class="card-header">Users Per Gender</div>
                            <?php
                            $dtt1 = [];
                            $mm1 = [];
                            foreach ($userbygender as $items) {
                                array_push($dtt1, $items["count"]);
                                array_push($mm1, $items["gender"]);
                            }
                            ?>
                        </div>
                        <div id="bar-chart-apex1"></div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">

                            <div class="card-header">Payments Per Status
                            <?php
                            $dtt = [];
                            $mm = [];
                            foreach ($paymentsperstatus as $item) {
                                array_push($dtt, $item["payments"]);
                                array_push($mm, $item["paystatus"]);
                            }
                            ?>
                            </div>
                            <div id="bar-chart-apex"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>

@endsection

@section('script')
<script>
var optionsBarChart = {
    series: [{
        name: 'Payments',
        data: <?php echo json_encode($dtt); ?>
    }],
    chart: {
        type: 'bar',
        width: "100%",
        height: 300
    },
    theme: {
        monochrome: {
            enabled: true,
            color: '#9e3299',
        }
    },
    plotOptions: {
        bar: {
            columnWidth: '25%',
            borderRadius: 2,
            radiusOnLastStackedBar: true,
            colors: {
                backgroundBarColors: ['#F2F4F6', '#F2F4F6', '#F2F4F6', '#F2F4F6'],
                backgroundBarRadius: 5,
            },
        }
    },
    labels: [1, 2, 3, 4, 5, 6, 7],
    xaxis: {
        categories: <?php echo json_encode($mm); ?>,
        crosshairs: {
            width: 1
        },
    },
    tooltip: {
        fillSeriesColor: false,
        onDatasetHover: {
            highlightDataSeries: false,
        },
        theme: 'light',
        style: {
            fontSize: '12px',
            fontFamily: 'Inter',
        },
        y: {
            formatter: function (val) {
                return val
            }
        }
    },
    };

    var barChartEl = document.getElementById('bar-chart-apex');
    if (barChartEl) {
        var barChart = new ApexCharts(barChartEl, optionsBarChart);
        barChart.render();
    }
    else{
        print("no load")
    }


var optionsBarChart1 = {
    series: [{
        name: 'Gender',
        data: <?php echo json_encode($dtt1); ?>
    }],
    chart: {
        type: 'bar',
        width: "100%",
        height: 300
    },
    theme: {
        monochrome: {
            enabled: true,
            color: '#9e3299',
        }
    },
    plotOptions: {
        bar: {
            columnWidth: '25%',
            borderRadius: 2,
            radiusOnLastStackedBar: true,
            colors: {
                backgroundBarColors: ['#F2F4F6', '#F2F4F6', '#F2F4F6', '#F2F4F6'],
                backgroundBarRadius: 5,
            },
        }
    },
    labels: [1, 2, 3, 4, 5, 6, 7],
    xaxis: {
        categories: <?php echo json_encode($mm1); ?>,
        crosshairs: {
            width: 1
        },
    },
    tooltip: {
        fillSeriesColor: false,
        onDatasetHover: {
            highlightDataSeries: false,
        },
        theme: 'light',
        style: {
            fontSize: '12px',
            fontFamily: 'Inter',
        },
        y: {
            formatter: function (val) {
                return val
            }
        }
    },
    };
    var barChartEl1 = document.getElementById('bar-chart-apex1');
    if (barChartEl1) {
        var barChart1 = new ApexCharts(barChartEl1, optionsBarChart1);
        barChart1.render();
    }
    else{
        print("no load")
    }
    </script>
@endsection
