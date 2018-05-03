@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Feed</div>

                <div class="panel-body">
                    <div class="form-group">
                        <label for="comment">Mande algo para seus amigo:</label>
                        <textarea class="form-control" rows="5" id="comment"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard Admin</div>
                
                <div class="panel-body">
                    You are logged in Admin Area!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('adminlte::page')

@section('title', 'Virtual Pub ADMIN')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>
@stop