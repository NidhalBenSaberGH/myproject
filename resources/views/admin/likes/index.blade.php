@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.likes.title')</h3>



    <div class="row">
        <div class="col-md-10">
            <canvas id="canvas" height="280" width="600"></canvas>


            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

            <script>
                var url = "{{url('admin/likes/chart')}}";
                var Title = [];
                var Likes = [];
                $(document).ready(function(){
                    $.get(url, function(response){
                        response.forEach(function(data){
                            Title.push(data.title);
                            Likes.push(data.likes);
                        });
                        var ctx = document.getElementById("canvas").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels:Title,
                                datasets: [{
                                    label: 'Likes by video title',
                                    data: Likes,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }],
                                    "xAxes":[]
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
                
                var url = "{{url('admin/likes/chart2')}}";
                var Datevideo = [];
                var Likes = [];
                $(document).ready(function(){
                    $.get(url, function(response){
                        response.forEach(function(data){
                            Datevideo.push(data.date);
                            Likes.push(data.likes);
                        });
                        var ctx = document.getElementById("canvas2").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels:Datevideo,
                                datasets: [{
                                    label: 'Likes by upload date',
                                    data: Likes,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }],

                                }
                            }
                        });
                    });
                });
            </script>


        </div>
    </div>


@stop