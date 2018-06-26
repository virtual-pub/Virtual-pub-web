@extends('adminlte::page')

@section('title', 'Virtual Pub ADMIN')

@section('content_header')
<div class="row">
    <div class='col-sm-11'>
        
    </div>
    <div class='col-sm-1'>
        <a href='{{route('colors.index')}}' class='btn btn-primary' 
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
                <h3> Inclusão de cor </h3>
                @elseif ($acao == 2) 
                <h3> Alteração de cor </h3>
                @else
                <h3> Consulta de cor </h3>
                @endif
            </div>
        @if ($acao == 1)
            <form method="post" action="{{route('colors.store')}}">
        @elseif ($acao == 2) 
            <form method="post" action="{{route('colors.update', $reg->id)}}">
            {!! method_field('put') !!}
        @endif
            {{ csrf_field() }}
                <div class="box-body">
                    <div class="row col-sm-12">
                        <div class="form-group col-sm-12">
                            <label for="nome">Nome da cor:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{$reg->nome or old('nome')}}" required>
                        </div>
                    </div>
                    <div class="row col-sm-12">
                            <div class="form-group col-sm-12">
                                <label>cor</label>
                                <div class="input-group color">
                                    <input type="text" class="form-control" id="hex" name="hex" value="{{$reg->hex or old('hex')}}" required>
                      
                                    <div class="input-group-addon">
                                        <i></i>
                                    </div>
                                </div>
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
@section('js')
<script>
$('.color').colorpicker();
</script>
@stop