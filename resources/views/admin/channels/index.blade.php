@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.channel.title')</h3>

    <div class="row">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
        <div class="col-md-10">
            <canvas id="canvas" height="280" width="600"></canvas>

            <script>
                var url = "{{url('admin/channels/chart')}}";
                var Likes = [];
                var Channels = [];
                var colortab=[];
                var countVideos =[];

                $(document).ready(function(){
                    $.get(url, function(response){
                        response.forEach(function(data){
                            Likes.push(data.likes);
                            Channels.push(data.channel_title);
                            countVideos.push((data.Count_videos))
                            colortab.push("rgb(" +  Math.floor(Math.random() * 255) + "," +  Math.floor(Math.random() * 255) + "," +  Math.floor(Math.random() * 255) + ")");
                        });
                        var ctx = document.getElementById("canvas").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels:Channels,
                                datasets: [{
                                    label: 'Total videos',
                                    data: countVideos,
                                    borderWidth: 1,
                                    borderColor: "blue"
                                }]
                            },
                            options: {
                                title: {
                                    display: true,
                                    fontSize: 24,
                                    text: 'Top 100 Channels by  total Videos'
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
        <div>
@stop