@extends('layouts.app')
<link href="{{ asset('css/linkstyle.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/tablestyle.css') }}" rel="stylesheet" type="text/css" >
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <h3 class="page_header">Edit Record</h3>
                <table class="page_table">
                    <tr>
                        <th>ID</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Title</th>
                        <th>Url</th>
                    </tr>
                    <tr>
                        <td>{{$page['id']}}</td>
                        <td>{{$page['position']}}</td>
                        <td>{{$page['status']}}</td>
                        <td>{{$page['title']}}</td>
                        <td>
                            <a href="http://<?php echo $_SERVER['SERVER_NAME'] . ':' .  $_SERVER['SERVER_PORT'] . '/' . $page['url'] ?>">
                                http://<?php echo $_SERVER['SERVER_NAME'] . ':' .  $_SERVER['SERVER_PORT'] . '/' . $page['url']?>
                            </a>
                    </tr>
                </table>
            </div>

            @if(count($errors))
                <div class="form-group">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form method="POST" action="/admin/update/{{ $page['id'] }}" style="margin: 0 50px 0 20px;">

                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="form-group row">
                    <label for="position_page" class="col-sm-3 col-form-label">Page Position</label>
                    <div class="col-sm-9">
                        <input name="position" type="text" class="form-control" id="position_page" placeholder="Page Position">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="status_page" class="col-sm-3 col-form-label">Page Status</label>
                    <div class="col-sm-9">
                        <input type="radio" name="status" value="enable" id="status_page"> Enable<br>
                        <input type="radio" name="status" value="disable" id="status_page"> Disable<br>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="title_page" class="col-sm-3 col-form-label">Page Title</label>
                    <div class="col-sm-9">
                        <input name="page_title" type="text" class="form-control" id="title_page" placeholder="Page Title" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="url_page" class="col-sm-3 col-form-label">Page URL</label>
                    <div class="col-sm-9">
                        <input name="url" type="text" class="form-control" id="url_page" placeholder="Page URL">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="link">Submit Page</button>
                    </div>
                </div>

            </form>
        </div>
@endsection
