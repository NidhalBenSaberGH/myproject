@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.dislikes.title')</h3>

    <p>
        {{ trans('quickadmin.qa_custom_controller_index') }}
    </p>

    <div class="row">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>

        <div class="col-md-10">
            <canvas id="canvas" height="280" width="600"></canvas>

            <script>
                var url = "{{url('admin/dislikes/chart')}}";
                var Title = [];
                var Dislikes = [];
                var colortab=[];

                $(document).ready(function(){
                    $.get(url, function(response){
                        response.forEach(function(data){
                            Title.push(data.title);
                            Dislikes.push(data.dislikes);
                            colortab.push("rgb(" +  Math.floor(Math.random() * 255) + "," +  Math.floor(Math.random() * 255) + "," +  Math.floor(Math.random() * 255) + ")");
                        });
                        var ctx = document.getElementById("canvas").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels:Title,
                                datasets: [{
                                    label: 'Dislikes by video title',
                                    data: Dislikes,
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
                                    }]
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
                var Likes =[];
                $(document).ready(function(){
                    $.get(url, function(response){
                        response.forEach(function(data){
                            Likes.push(data.likes);
                        });
                        var ctx = document.getElementById("canvas2").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels:Title,
                                datasets: [{
                                    label: 'Likes by video title',
                                    data: Likes,
                                    borderWidth: 1,
                                    backgroundColor: "Aqua"
                                },
                                    {

                                        label: 'Dislikes by video title',
                                        data: Dislikes,
                                        borderWidth: 1,
                                        backgroundColor: "Fuchsia",
                                        type: 'line'
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