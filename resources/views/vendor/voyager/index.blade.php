@extends('voyager::master')

@section('content')
<script src="/js/Chart.min.js"></script>
<script src="/js/utils.js"></script>
<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
</style>

<div class="page-content">
    <div class="header-drashboard container-fluid" style="display:flex;align-items: center;">
        <div class="h3 logo" style="z-index:9;position: relative;margin-bottom:20px">
            <img src="/img/core-img/logo1.png" alt="" style="max-height: 60px">
            <img src="/img/core-img/logo.png" alt="" style="max-height: 60px">
        </div>
        <span style="font-weight: 600;font-size: x-large;color: #4caf50;z-index:9;position: relative; margin-left:20px">
            TRANG QUẢN TRỊ HỆ THỐNG</span>
    </div>
    @include('voyager::alerts')
    @include('voyager::dimmers')

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body" style="min-height:450px">
                    <canvas id="canvas-new"></canvas>
                </div>
            </div>
        </div>

        @if (Auth::user()->can('browse', app(\App\User::class)))
        <div class="col-md-6">
            <div class="panel panel-bordered">
                <div class="panel-body" style="min-height:450px">
                    <canvas id="canvas-user"></canvas>
                </div>
            </div>
        </div>
        @endif

        @if (Auth::user()->can('browse', app(\App\Models\OperationLog::class)) || Auth::user()->role->name == 'manager')
        <div class="col-md-6">
            <div class="panel panel-bordered">
                <div class="panel-body" style="min-height:450px">
                    <canvas id="canvas-operation"></canvas>
                </div>
            </div>
        </div>
        @endif

        @if (Auth::user()->can('browse', app(\App\Models\WorkoutRegistration::class)))
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body" style="min-height:450px">
                    <canvas id="canvas-workout"></canvas>
                </div>
            </div>
        </div>
        @endif

        @if (Auth::user()->can('browse', app(\App\Models\Voucher::class)))
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body" style="min-height:450px">
                    <canvas id="canvas-voucher"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body" style="min-height:450px">
                    <canvas id="canvas-voucher1"></canvas>
                </div>
            </div>
        </div>
        @endif

        @if (Auth::user()->can('browse', app(\App\Models\Tuition::class)))
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="chart" style="min-height:450px">
                        <canvas id="canvas-tuition"></canvas>
                    </div>

                    <div class="text-left">
                        <ul>
                            @foreach($tuitionInfo as $dojo=>$total)
                            <li><b>{{ $dojo }}: </b> {{ number_format($total, 0, '', ' ') }} VNĐ</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

</div>


<script>
    var MONTHS = ['Th 1', 'Th 2', 'Th 3', 'Th 4', 'Th 5', 'Th 6', 'Th 7', 'Th 8', 'Th 9', 'Th 10', 'Th 11', 'Th 12'];
    var color = Chart.helpers.color;
    const COLORS = [
            '#4dc9f6',
            '#f67019',
            '#f53794',
            '#537bc4',
            '#acc236',
            '#166a8f',
            '#00a950',
            '#58595b',
            '#8549ba'
        ];


    // News Data
    var newsData = {
        labels: ['Th 1', 'Th 2', 'Th 3', 'Th 4', 'Th 5', 'Th 6', 'Th 7', 'Th 8', 'Th 9', 'Th 10', 'Th 11', 'Th 12'],
        datasets: [{
                label: 'Bài viết',
                backgroundColor: color(window.chartColors.blue).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: {{ json_encode($newsChart['post']) }}
            },
            {
                label: 'Video',
                backgroundColor: color(window.chartColors.green).rgbString(),
                borderColor: window.chartColors.green,
                borderWidth: 1,
                data: {{ json_encode($newsChart['video']) }}
            },
            {
                label: 'Tài liệu',
                backgroundColor: color(window.chartColors.yellow).rgbString(),
                borderColor: window.chartColors.yellow,
                borderWidth: 1,
                data: {{ json_encode($newsChart['doc']) }}
            }
        ]
    };


    // User Data
    var userData = {
        labels: ['Th 1', 'Th 2', 'Th 3', 'Th 4', 'Th 5', 'Th 6', 'Th 7', 'Th 8', 'Th 9', 'Th 10', 'Th 11', 'Th 12'],
        datasets: [{
                label: 'Số tài khoản',
                backgroundColor: color(window.chartColors.green).alpha(0.5).rgbString(),
                borderColor: window.chartColors.green,
                lineTension: 0,
                fill: true,
                data: {{ json_encode($userChart['userArray']) }}    
            }]
    };


    // Operation Data
    var operationData = {
        labels: ['Th 1', 'Th 2', 'Th 3', 'Th 4', 'Th 5', 'Th 6', 'Th 7', 'Th 8', 'Th 9', 'Th 10', 'Th 11', 'Th 12'],
        datasets: [{
                label: 'Số người truy cập',
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                lineTension: 0,
                fill: true,
                data: {{ json_encode($operationChart['operationArray']) }}    
            }]
    };


    // Workout Data
    var workoutData = {
        labels: ['Th 1', 'Th 2', 'Th 3', 'Th 4', 'Th 5', 'Th 6', 'Th 7', 'Th 8', 'Th 9', 'Th 10', 'Th 11', 'Th 12'],
        datasets: []
    };

    var data = @Json($workoutChart['data']);

    var index = 0;
    for(const key in data) 
    {
        var dataSet = {
                        label: key,
                        backgroundColor: color(COLORS[index]).rgbString(),
                        borderColor: COLORS[index],
                        borderWidth: 1,
                        data: data[key]
                    };
        workoutData.datasets.push(dataSet);
        index++;
    }


    // Voucher Data
    var voucherData = {
        labels: ['Th 1', 'Th 2', 'Th 3', 'Th 4', 'Th 5', 'Th 6', 'Th 7', 'Th 8', 'Th 9', 'Th 10', 'Th 11', 'Th 12'],
        datasets: [{
                label: 'Đã phát ra',
                backgroundColor: color(window.chartColors.green).rgbString(),
                borderColor: window.chartColors.green,
                borderWidth: 1,
                data: {{ json_encode($voucherChart['total']) }}
            },
            {
                label: 'Được thu thập',
                backgroundColor: color(window.chartColors.yellow).rgbString(),
                borderColor: window.chartColors.yellow,
                borderWidth: 1,
                data: {{ json_encode($voucherChart['collected']) }}
            },
            {
                label: 'Đã sử dụng',
                backgroundColor: color(window.chartColors.red).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: {{ json_encode($voucherChart['used']) }}
            }
        ]
    };


    // Pay for Voucher Data
    var voucher1Data = {
        labels: ['Th 1', 'Th 2', 'Th 3', 'Th 4', 'Th 5', 'Th 6', 'Th 7', 'Th 8', 'Th 9', 'Th 10', 'Th 11', 'Th 12'],
        datasets: [{
                label: 'Chi cho mã giảm giá',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                lineTension: 0,
                fill: true,
                data: {{ json_encode($voucher1Chart['moneyReductioneyArray']) }}
            }]
    };


    // Tuition Data
    var tuitionData = {
        labels: ['Th 1', 'Th 2', 'Th 3', 'Th 4', 'Th 5', 'Th 6', 'Th 7', 'Th 8', 'Th 9', 'Th 10', 'Th 11', 'Th 12'],
        datasets: []
    };

    var data = @Json($tuitionsChart['data']);

    var index = 0;
    for(const key in data) 
    {
        var dataSet = {
                        label: key,
                        backgroundColor: color(COLORS[index]).rgbString(),
                        borderColor: COLORS[index],
                        borderWidth: 1,
                        data: data[key]
                    };
        tuitionData.datasets.push(dataSet);
        index++;
    }

    window.onload = function() {
        var ctx = document.getElementById('canvas-new').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: newsData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    fontSize: 18,
                    fontColor: '#000',
                    text: "{{ $newsChart['title'] }}",
                },
                scales: {
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Số lượng'
						}
					}]
				}
            }
        });

        var ctx = document.getElementById('canvas-user').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'line',
            data: userData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                },
				title: {
                    display: true,
                    fontSize: 18,
                    fontColor: '#000',
					text: "{{ $userChart['title'] }}"
                },
                tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
                },
                scales: {
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Số lượng'
                        },
					}]
				}
            }
        });

        var ctx = document.getElementById('canvas-operation').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'line',
            data: operationData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                },
				title: {
                    display: true,
                    fontSize: 18,
                    fontColor: '#000',
					text: "{{ $operationChart['title'] }}"
                },
                tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
                },
                scales: {
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Số lượng'
                        },
					}]
				}
            }
        });

        var ctx = document.getElementById('canvas-workout').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: workoutData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    fontSize: 18,
                    fontColor: '#000',
                    text: "{{ $workoutChart['title'] }}",
                },
                scales: {
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Số lượng'
						}
					}]
				}
            }
        });

        var ctx = document.getElementById('canvas-voucher').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: voucherData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    fontSize: 18,
                    fontColor: '#000',
                    text: "{{ $voucherChart['title'] }}",
                },
                scales: {
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Số lượng'
						}
					}]
				}
            }
        });

        var ctx = document.getElementById('canvas-voucher1').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'line',
            data: voucher1Data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                },
				title: {
                    display: true,
                    fontSize: 18,
                    fontColor: '#000',
					text: "{{ $voucher1Chart['title'] }}"
                },
                tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
                },
                scales: {
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Số tiền (VNĐ)'
						}
					}]
				}
            }
        });

        var ctx = document.getElementById('canvas-tuition').getContext('2d');
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: tuitionData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom',
                },
                title: {
                    display: true,
                    fontSize: 18,
                    fontColor: '#000',
                    text: "{{ $tuitionsChart['title'] }}",
                },
                scales: {
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Số lượng'
						}
					}]
				}
            }
        });
    };
</script>


@stop