@extends('adminlte::page')

@section('title', 'Virtual-Pub | formulário de estilos')

@section('content_header')
<div class="row">
    <div class='col-sm-11'>
        
    </div>
    <div class='col-sm-1'>
        <a href='{{route('estilos.index')}}' class='btn btn-primary' 
           role='button'> Voltar </a>
    </div>
</div>
@stop

@section('content')
<div class="row">
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
</div>    



<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                @if ($acao == 1)
                <h3> Inclusão de estilo </h3>
                @elseif ($acao == 2) 
                <h3> Alteração de estilo </h3>
                @else
                <h3> Consulta de Estilo </h3>
                @endif
            </div>
        @if ($acao == 1)
            <form method="post" action="{{route('estilos.store')}}">
        @elseif ($acao == 2) 
            <form method="post" action="{{route('estilos.update', $reg->id)}}">
            {!! method_field('put') !!}
        @endif
            {{ csrf_field() }}
                <div class="box-body">
                    <div class="row col-sm-12">
                        <div class="form-group col-sm-12">
                            <label for="nome">Nome do Estilo:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{$reg->nome or old('nome')}}" required>
                        </div>
                    </div>
                    <div class="row col-sm-12">
                            <div class="form-group col-sm-12">
                                <label>Descrição</label>
                                <textarea class="form-control" name="descricao" rows="5" placeholder="enter" request>{{$reg->descricao or old('descricao')}}</textarea>
                            </div>
                    </div>
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