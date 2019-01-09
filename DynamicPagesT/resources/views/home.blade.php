@extends('layouts.app')
<link href="{{ asset('css/buttonstyle.css') }}" rel="stylesheet" type="text/css" >
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">Dashboard</div>

                <div class="card-body" >
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            <div class="card" style="margin-top: 20px;">
                <div class="card-header">List of pages</div>

                <div class="card-body">
                    <ul>
                        @foreach($pages as $page)
                            @if ($page['use_in_main_menu'])
                                <?php $url = $page['url']?>
                                <div style="margin-bottom: 10px;">
                                    <form action="http://<?php echo $_SERVER['SERVER_NAME'] . ':' .  $_SERVER['SERVER_PORT'] . '/' . $url?>">
                                        <input class="button_link" type="submit" value="{{$page['title']}}" <?php if (!$page['status']){ ?> disabled <?php   } ?> />
                                    </form>
                                </div>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
