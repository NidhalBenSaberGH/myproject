@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.likes.title')</h3>

    <div class="row">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
        <div class="col-md-10">
            <canvas id="canvas" height="280" width="600"></canvas>

            <script>
                var url = "{{url('admin/likes/chart')}}";
                var Title = [];
                var Likes = [];
                var colortab=[];

                $(document).ready(function(){
                    $.get(url, function(response){
                        response.forEach(function(data){
                            Title.push(data.title);
                            Likes.push(data.likes);
                            colortab.push("rgb(" +  Math.floor(Math.random() * 255) + "," +  Math.floor(Math.random() * 255) + "," +  Math.floor(Math.random() * 255) + ")");
                        });
                        var ctx = document.getElementById("canvas").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels:Title,
                                datasets: [{
                                    label: 'Likes by Video title',
                                    data: Likes,
                                    borderWidth: 1,
                                    backgroundColor: colortab
                                }]
                            },
                            options: {
                                title: {
                                    display: true,
                                    fontSize: 24,
                                    text: 'Most 10 liked videos'
                                },
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
                        var dynamicColors = function() {
                            var r = Math.floor(Math.random() * 255);
                            var g = Math.floor(Math.random() * 255);
                            var b = Math.floor(Math.random() * 255);
                            return "rgb(" + r + "," + g + "," + b + ")";
                        }

                    });
                });
            </script>


        </div>


        <div class="col-md-10">
            <canvas id="canvas2" height="280" width="600"></canvas>

            <script>
                var url = "{{url('admin/likes/chart')}}";
                var Datevideo = [];

                $(document).ready(function(){
                    $.get(url, function(response){
                        response.forEach(function(data){
                            Datevideo.push(data.date);
                        });
                        var ctx = document.getElementById("canvas2").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels:Datevideo,
                                datasets: [{
                                    label: 'Likes by upload date',
                                    data: Likes,
                                    borderWidth: 1,
                                    backgroundColor: colortab
                                }]
                            },
                            options: {
                                title: {
                                    display: true,
                                    fontSize: 24,
                                    text: 'Most 10 liked videos by upload date'
                                },
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