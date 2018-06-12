@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.comment_likes.title')</h3>


    <div class="row">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
        <div class="col-md-10">
            <canvas id="canvas" height="280" width="600"></canvas>

            <script>
                var url = "{{url('admin/comment_likes/chart')}}";
                var Video_id = [];
                var Likes = [];
                var colortab=[];

                $(document).ready(function(){
                    $.get(url, function(response){
                        response.forEach(function(data){
                            Video_id.push(data.video_id);
                            Likes.push(data.likes);
                            colortab.push("rgb(" +  Math.floor(Math.random() * 255) + "," +  Math.floor(Math.random() * 255) + "," +  Math.floor(Math.random() * 255) + ")");
                        });
                        var ctx = document.getElementById("canvas").getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels:Video_id,
                                datasets: [{
                                    label: 'Comment Likes by video ID',
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
@stop