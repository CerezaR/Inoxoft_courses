@extends('layouts.app')
<link href="{{ asset('css/linkstyle.css') }}" rel="stylesheet" type="text/css" >
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2" style="margin: auto;">
                <div class="card" >
                    <div class="card-header">Admin Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card-body">This is Admin Dashboard. You must be privileged to be here !</div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="link-wrapper">
                <p><a class="link" href="http://<?php echo $_SERVER['SERVER_NAME'] . ':' .  $_SERVER['SERVER_PORT'] ?>/admin/show">Show pages</a></p>
            </div>
            <div class="link-wrapper">
                <p><a class="link" href="http://<?php echo $_SERVER['SERVER_NAME'] . ':' .  $_SERVER['SERVER_PORT'] ?>/admin/add">Add new page</a></p>
            </div>
        </div>
    </div>
@endsection
