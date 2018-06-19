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



<div class='col-sm-6'>
    @if ($acao == 1)
    <form method="post" action="{{route('posts.store')}}">
     @elseif ($acao == 2) 
    <form method="post" action="{{route('posts.update', $reg->id)}}">
        {!! method_field('put') !!}
    @endif
        {{ csrf_field() }}
        <div class="form-group">
            <label>Textarea</label>
            <textarea class="form-control" name="description" rows="3" placeholder="enter" request>{{$reg->description or old('description')}}</textarea>
          </div>

        
        <div class="form-group col-sm-6">
            <label for="user_id">Usuário:</label>
            <select class="form-control" id="user_id" name="user_id">
                @foreach ($user as $user)    
                <option value="{{$user->id}}" 
                        @if ((isset($reg) && $reg->user_id==$user->id) 
                        or old('user_id') == $user->id) selected @endif>
                        {{$user->name}}</option>
                @endforeach    
            </select>
        </div>
        
        
        

        @if($acao == 1 or $acao == 2)
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="reset" class="btn btn-success">Limpar</button>
        @endif
    </form>    
</div>


@stop