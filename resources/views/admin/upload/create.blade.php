@extends('layouts.app')

@section('content')
    <h3 class="page-title">Upload CSV file</h3>
    <div class="modal-body">
    <div class="row">
        <div class="col-sm-9">

            {!! Form::open(['method'=>'POST', 'action'=>'Admin\UploadController@store', 'files'=>true])  !!}
            {{ csrf_field() }}

            <div class="form-group">
                {!! Form::label('csvfilevideo', 'CSV File For Videos:') !!}
                {!! Form::file('csvfile', null, [ 'class'=>'form-control' ]) !!}
                {!! Form::hidden('type', 'video') !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Upload', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

        </div>

        <div class="col-sm-9">

            {!! Form::open(['method'=>'POST', 'action'=>'Admin\UploadController@store', 'files'=>true])  !!}
            {{ csrf_field() }}

            <div class="form-group">
                {!! Form::label('csvfilecomment', 'CSV File For Comments:') !!}
                {!! Form::file('csvfile', null, [ 'class'=>'form-control' ]) !!}
                {!! Form::hidden('type', 'comment') !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Upload', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>

</div>
@stop