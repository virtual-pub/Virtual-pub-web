@extends('adminlte::page')

@section('title', 'Virtual Pub ADMIN')

@section('content_header')
<div class="row">
    <div class='col-sm-11'>

    </div>
    <div class='col-sm-1'>
        <a href='{{route('users.show', $reg->id)}}' class='btn btn-primary' 
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
                    @if ($acao == 2) 
                    <h3 class="box-title"> Alterar seus dados</h3>
                    @else
                    <h3 class="box-title"> Consulta dados </h3>
                    @endif
            </div>
            
        @if ($acao == 1)
            <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
        @elseif ($acao == 2) 
            <form method="post" action="{{route('users.update', $reg->id)}}" enctype="multipart/form-data">
            {!! method_field('put') !!}
        @endif
            {{ csrf_field() }}
                <div class="box-body">

                   
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="name">nome:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$reg->name or old('name')}}"required>
                        </div>
                    </div>

                    
                    <div class="form-group col-sm-12">
                        <label>Sobre</label>
                        <textarea class="form-control" name="sobre" rows="5" placeholder="enter" request>{{$reg->sobre or old('sobre')}}</textarea>
                    </div>

                    @can('isFabricante')
                    <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="fabricante_name">fabricante:</label>
                                <input type="text" class="form-control" id="fabricante_name" name="fabricante_name" value="{{$reg->fabricante_name or old('fabricante_name')}}"required>
                            </div>
                    </div>
                    <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="website">website:</label>
                                <input type="text" class="form-control" id="website" name="website" value="{{$reg->website or old('website')}}"required>
                            </div>
                    </div>
                    @endcan
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