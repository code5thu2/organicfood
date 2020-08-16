@extends('layouts.admin')
@section('title','admin home')
@section('main')
<div class="row">
    <!-- metric -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Khách hàng</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1 text-primary">32,100</h1>
                </div>
                <div class="metric-label d-inline-block float-right text-success">
                    <a href=""><strong>Detail</strong></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /. metric -->
    <!-- metric -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Tổng đơn hàng</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1 text-primary">4,200</h1>
                </div>
                <div class="metric-label d-inline-block float-right text-danger">
                    <a href=""><strong>Detail</strong></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /. metric -->
    <!-- metric -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Doanh thu</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1 text-primary">$5,656</h1>
                </div>
                <div class="metric-label d-inline-block float-right text-danger">
                    <a href=""><strong>Detail</strong></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /. metric -->
    <!-- metric -->
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Đánh giá</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1 text-primary">24</h1>
                </div>
                <div class="metric-label d-inline-block float-right text-success">
                    <a href=""><strong>Detail</strong></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /. metric -->
</div>
@stop()

@section('js')
<script src="{{url('public/backend/assets')}}/vendor/charts/Chart.min.js"></script>
<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
            datasets: [{
                label: 'line',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@stop()