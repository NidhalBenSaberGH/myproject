@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('quickadmin.qa_dashboard')</div>

                <div class="panel-body">
                    @lang('quickadmin.qa_dashboard_text')

                    @if(Session::has('file_uploaded'))
                        <br>
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('file_uploaded') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
