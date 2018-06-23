@extends('adminlte::page')

@section('title', 'Virtual Pub ADMIN')

@section('content_header')
<div class='col-sm-11'>
    @if ($acao == 1)
    <h2> Inclusão de copos </h2>
    @elseif ($acao == 2) 
    <h2> Alteração de copos </h2>
    @else
    <h2> Consulta Copo </h2>
    @endif
</div>
<div class='col-sm-1'>
    <a href='{{route('copos.index')}}' class='btn btn-primary' 
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
    <form method="post" action="{{route('copos.store')}}">
     @elseif ($acao == 2) 
    <form method="post" action="{{route('copos.update', $reg->id)}}">
        {!! method_field('put') !!}
    @endif
        {{ csrf_field() }}
        <div class="form-group col-sm-6">
                <label for="nome">Nome do Copo:</label>
                <input type="text" class="form-control" id="nome" 
                       name="nome" 
                       value="{{$reg->nome or old('nome')}}"
                       required>
        </div>

        <div class="form-group col-sm-12">
            <label>Textarea</label>
            <textarea class="form-control" name="descricao" rows="5" placeholder="enter" request>{{$reg->descricao or old('descricao')}}</textarea>
        </div>

        @if($acao == 1 or $acao == 2)
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="reset" class="btn btn-success">Limpar</button>
        @endif
    </form>    
</div>


@stop