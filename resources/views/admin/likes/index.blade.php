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
                var ColorArray = []
                var url = "{{url('admin/likes/chart2')}}";
                var Datevideo = [];
                var Likes = [];
                var colortab=[];

                $(document).ready(function(){
                    $.get(url, function(response){
                        response.forEach(function(data){
                            Datevideo.push(data.date);
                            Likes.push(data.likes);
                            colortab.push("rgb(" +  Math.floor(Math.random() * 255) + "," +  Math.floor(Math.random() * 255) + "," +  Math.floor(Math.random() * 255) + ")");
                        });
                        //var colortab = ["Red","Blue","Green","Yellow","Pink","Grey","Orange","Purple","DarkCyan","Tan","Chartreuse"];
                        console.log(colortab);
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
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }],
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
    </div>


@stop