@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <h1></h1>

            @foreach($post as $post)
            <div class="panel panel-default">
                <div class="panel-heading"> publicou</div>

                <div class="panel-body">
                    {{$post->description}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection