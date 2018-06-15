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
                    <script src="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></script>
                    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>


                    <div class='container'>
                        <table id="video-grid"  class="display" width="100%">
                            <thead>
                            <tr>
                                <th>&nbsp;Video ID</th>
                                <th>&nbsp; Video Title</th>
                                <th>&nbsp; Channel Title</th>
                                <th>&nbsp; Category ID</th>
                                <th>&nbsp; Tags</th>
                                <th>&nbsp; Views</th>
                                <th>&nbsp; Likes</th>
                                <th>&nbsp; Dislikes</th>
                                <th>&nbsp; Total Comment </th>
                                <th>&nbsp; thumbnail link</th>
                                <th>&nbsp; Date</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>&nbsp;Video ID</th>
                                <th>&nbsp; Video Title</th>
                                <th>&nbsp; Channel Title</th>
                                <th>&nbsp; Category ID</th>
                                <th>&nbsp; Tags</th>
                                <th>&nbsp; Views</th>
                                <th>&nbsp; Likes</th>
                                <th>&nbsp; Dislikes</th>
                                <th>&nbsp; Total Comment </th>
                                <th>&nbsp; thumbnail link</th>
                                <th>&nbsp; Date</th>
                            </tr>
                            </tfoot>
                        </table>
                        <script>
                            $(document).ready(function() {
                                $('#video-grid').DataTable( {
                                    "processing": true,
                                    "serverSide": true,
                                    "ajax": {
                                        "url": "/admin/home/datatable",
                                        "type": "POST"
                                    },
                                    "columns": [
                                        { "data": "video_id" },
                                        { "data": "title" },
                                        { "data": "channel_title" },
                                        { "data": "category_id" },
                                        { "data": "tags" },
                                        { "data": "views" },
                                        { "data": "likes" },
                                        { "data": "dislikes" },
                                        {"data": "comment_total"},
                                        { "data": "thumbnail_link" },
                                        { "data": "date"}
                                    ]
                                } );
                            } );
                        </script>
                    </div>

                <!--End Datatable -->


                </div>
            </div>
        </div>
    </div>
@endsection
