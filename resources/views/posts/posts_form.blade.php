@extends('adminlte::page')

@section('title', 'Virtual Pub ADMIN')

@section('content_header')
<div class='col-sm-11'>
    @if ($acao == 1)
    <h2> Publicar Post </h2>
    @elseif ($acao == 2) 
    <h2> Alteração de post </h2>
    @else
    <h2> visualizar Post </h2>
    @endif
</div>
<div class='col-sm-1'>
    <a href='{{route('posts.index')}}' class='btn btn-primary' 
       role='button'> Voltar </a>
</div>
@stop

@section('content')
@if ($errors->any())
<div class="col-sm-12">
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
</div>
@endif    


<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                    @if ($acao == 1)
                    <h3 class="box-title"> publicar </h3>
                    @elseif ($acao == 2) 
                    <h3 class="box-title"> Alterar Publicação </h3>
                    @else
                    <h3 class="box-title"> Publicação </h3>
                    @endif
            </div>
            @if ($acao == 1)
            <form method="post" action="{{route('posts.store')}}">
            @elseif ($acao == 2) 
            <form method="post" action="{{route('posts.update', $reg->id)}}">
                {!! method_field('put') !!}
            @endif
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label>Textarea</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="enter" request>{{$reg->description or old('description')}}</textarea>
                    </div>

                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{$user->id or old('id')}}"required>
                
                
                
                </div>
                <div class="box-footer">
                    @if($acao == 1 or $acao == 2)
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <button type="reset" class="btn btn-success">Limpar</button>
                    @endif
                </div>
            </form>    
        </div>
    </div>
</div>

@stop