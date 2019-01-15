@extends('layouts.app')
<link href="{{ asset('css/linkstyle.css') }}" rel="stylesheet" type="text/css" >
@section('content')

    <h2 style="margin-left: 20px">Add a page</h2>
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
    <form method="POST" action="save" style="margin: 0 50px 0 20px;">
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="title_page" class="col-sm-3 col-form-label">Page Title</label>
            <div class="col-sm-9">
                <input name="page_title" type="text" class="form-control" id="title_page" placeholder="Page Title" >
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
            <label for="position_page" class="col-sm-3 col-form-label">Page Position</label>
            <div class="col-sm-9">
                <input name="position" type="text" class="form-control" id="position_page" placeholder="Page Position">
            </div>
        </div>

        <div class="form-group row">
            <label for="use_page" class="col-sm-3 col-form-label">Page Use in Main Menu</label>
            <div class="col-sm-9">
                <input type="radio" name="use" value="yes" id="use_page"> Yes<br>
                <input type="radio" name="use" value="no" id="use_page"> No<br>
            </div>
        </div>

        <div class="form-group row">
            <label for="url_page" class="col-sm-3 col-form-label">Page URL</label>
            <div class="col-sm-9">
                <input name="url" type="text" class="form-control" id="url_page" placeholder="Page URL">
            </div>
        </div>

        <div class="form-group row">
            <label for="title_meta" class="col-sm-3 col-form-label">Meta Title</label>
            <div class="col-sm-9">
                <input name="meta_title" type="text" id="title_meta" class="form-control" placeholder="Meta Title">
            </div>
        </div>

        <div class="form-group row">
            <label for="description_meta" class="col-sm-3 col-form-label">Meta Description</label>
            <div class="col-sm-9">
                <input name="meta_description" type="text" id="description_meta" class="form-control"
                       placeholder="Meta Description">
            </div>
        </div>

        <div class="form-group row">
            <label for="keywords_meta" class="col-sm-3 col-form-label">Meta Keywords</label>
            <div class="col-sm-9">
                <input name="meta_keywords" type="text" id="keywords_meta" class="form-control" placeholder="Meta Keywords">
            </div>
        </div>

        <div class="form-group row">
            <label for="page_body" class="col-sm-3 col-form-label">Page Body</label>
            <div class="col-sm-9">
                <textarea name="body" id="page_body" class="form-control" placeholder="Page body"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="link">Submit Page</button>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <p><a class="link" href="http://<?php echo $_SERVER['SERVER_NAME'] . ':' .  $_SERVER['SERVER_PORT'] ?>/admin">Admin dashboard</a></p>
            </div>
        </div>

    </form>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection
