@extends('layouts.app')

@section('description'){{$page['meta_description']}}  @stop
@section('keywords'){{$page['meta_keywords']}}  @stop
@section('title'){{$page['meta_title']}}  @stop
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>{{ $page['title'] }}</h3>
                    </div>
                    <div class="panel-body">
                        {!! $page['page_body'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
