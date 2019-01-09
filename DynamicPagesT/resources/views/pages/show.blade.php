@extends('layouts.app')
<link href="{{ asset('css/tablestyle.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/linkstyle.css') }}" rel="stylesheet" type="text/css" >

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="page_header">Page data</h3>
                <table class="page_table">
                    <tr>
                        <th>ID</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Action</th>
                    </tr>
                    @foreach($pages as $page)
                    <tr>
                        <td>{{$page['id']}}</td>
                        <td>{{$page['position']}}</td>
                        <td>{{$page['status']}}</td>
                        <td>{{$page['title']}}</td>
                        <td>
                            <a href="http://<?php echo $_SERVER['SERVER_NAME'] . ':' .  $_SERVER['SERVER_PORT'] . '/' . $page['url'] ?>">
                                http://<?php echo $_SERVER['SERVER_NAME'] . ':' .  $_SERVER['SERVER_PORT'] . '/' . $page['url']?>
                            </a>
                        </td>
                        <td>
                            <a href="/admin/edit/{{ $page['id'] }}"><button style="margin-right: 7px;">Edit</button></a>
                            <a href="/admin/delete/{{ $page['id'] }}"><button>Delete</button></a>
                        </td>

                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div>
            <div class="link-wrapper">
                <p><a class="link" href="http://<?php echo $_SERVER['SERVER_NAME'] . ':' .  $_SERVER['SERVER_PORT'] ?>/admin/add">Add new page</a></p>
            </div>
            <div class="link-wrapper">
                <p><a class="link" href="http://<?php echo $_SERVER['SERVER_NAME'] . ':' .  $_SERVER['SERVER_PORT'] ?>/admin">Admin dashboard</a></p>
            </div>
        </div>
    </div>
@endsection
