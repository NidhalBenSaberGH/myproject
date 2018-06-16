@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('quickadmin.qa_dashboard')</div>

                <div class="panel-body">
                    @lang('quickadmin.qa_dashboard_text')

                    @if(Session::has('file_uploaded'))
                        <br>
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('file_uploaded') }}</p>
                    @endif

                <!-- Datatable-->
                    <br><br>
                    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
                    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
                    <script src="//cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css"></script>
                    <script src="//cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>


                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                            <table id="video-grid"  class="display table table-striped table-bordered" width="100%">
                                <thead>
                                <tr>
                                    <th>Video ID</th>
                                    <th>Video Title</th>
                                    <th>Channel Title</th>
                                    <th>Category ID</th>
                                    <th>Tags</th>
                                    <th>Views</th>
                                    <th>Likes</th>
                                    <th>Dislikes</th>
                                    <th>Total Comment </th>
                                    <th>thumbnail link</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                        </div>
                    </div>
                        <script>
                            $(document).ready(function() {
                                var table = $('#video-grid').DataTable( {
                                    "processing": true,
                                    "serverSide": false,
                                    "scrollY":"500px",
                                    "bAutoWidth" : false,
                                    "sScrollX":"100%",
                                    "sScrollXInner": "99%",
                                    "paging":true,
                                    "initComplete": function( settings, json ) {
                                        if(typeof table !=="undefined"){
                                            console.log("===> ")
                                           // table.columns.adjust().draw();
                                        }
                                    },
                                    "ajax": {
                                        "url": "{{ route('admin.home.datatable') }}",
                                        "type": "GET"
                                    },
                                    "columns": [
                                        {
                                            "data" : "video_id" , "ClassName":"linetd" , "createdCell" : function (td,cellData,rowData,row,col) {

                                            }
                                        },
                                        {
                                            "data" : "title" , "ClassName":"linetd" , "createdCell" : function (td,cellData,rowData,row,col) {

                                            }
                                        },
                                        {
                                            "data" : "channel_title" , "ClassName":"linetd" , "createdCell" : function (td,cellData,rowData,row,col) {

                                            }
                                        },
                                        {
                                            "data" : "category_id" , "ClassName":"linetd" , "createdCell" : function (td,cellData,rowData,row,col) {

                                            }
                                        },
                                        {
                                            "data" : "tags" , "ClassName":"linetd" , "createdCell" : function (td,cellData,rowData,row,col) {

                                            }
                                        },
                                        {
                                            "data" : "views" , "ClassName":"linetd" , "createdCell" : function (td,cellData,rowData,row,col) {

                                            }
                                        },
                                        {
                                            "data" : "likes" , "ClassName":"linetd" , "createdCell" : function (td,cellData,rowData,row,col) {

                                            }
                                        },
                                        {
                                            "data" : "dislikes" , "ClassName":"linetd" , "createdCell" : function (td,cellData,rowData,row,col) {

                                            }
                                        },
                                        {
                                            "data" : "comment_total" , "ClassName":"linetd" , "createdCell" : function (td,cellData,rowData,row,col) {

                                            }
                                        },
                                        {
                                            "data" : "thumbnail_link" , "ClassName":"linetd" , "createdCell" : function (td,cellData,rowData,row,col) {

                                                $(td).html('');
                                                $(td).html('<img src="'+cellData+'" width="50" height="50"/>');

                                            }
                                        },
                                        {
                                            "data" : "date" , "ClassName":"linetd" , "createdCell" : function (td,cellData,rowData,row,col) {

                                            }
                                        }
                                    ]
                                } ).fnAdjustColumnSizing( false );
                            } );
                        </script>
                    </div>

                <!--End Datatable -->


                </div>
            </div>
        </div>
    </div>
@endsection
