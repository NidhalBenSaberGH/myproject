@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.views.title')</h3>



    <div class="row">
        <div class="col-md-10">
            <canvas id="canvas" height="280" width="600"></canvas>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

            <script>
                var url = "{{url('admin/views/chart')}}";
                var Title = [];
                var Views = [];
                $(document).ready(function(){
                    $.get(url, function(response){
                        response.forEach(function(data){
                            Title.push(data.title);
                            Views.push(data.views);
                        });
                        var ctx = document.getElementById("canvas").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels:Title,
                                datasets: [{
                                    label: 'Views by video title',
                                    data: Views,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });
                    });
                });
            </script>


        </div>

        <div class="col-md-10">
            <canvas id="canvas2" height="280" width="600"></canvas>

            <script>
                var url = "{{url('admin/views/chart2')}}";
                var Datevideo = [];
                var Views = [];
                $(document).ready(function(){
                    $.get(url, function(response){
                        response.forEach(function(data){
                            Datevideo.push(data.date);
                            Views.push(data.views);
                        });
                        var ctx = document.getElementById("canvas2").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels:Datevideo,
                                datasets: [{
                                    label: 'Views by upload date',
                                    data: Views,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });
                    });
                });
            </script>


        </div>
    </div>


@stop