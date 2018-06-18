@extends('adminlte::page')

@section('title', 'Virtual Pub ADMIN')

@section('content_header')
<div class='col-sm-11'>
    @if ($acao == 1)
    <h2> Inclusão de Cervejas </h2>
    @elseif ($acao == 2) 
    <h2> Alteração de Cervejas </h2>
    @else
    <h2> Consulta Cerveja </h2>
    @endif
</div>
<div class='col-sm-1'>
    <a href='{{route('cervejas.index')}}' class='btn btn-primary' 
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
    <form method="post" action="{{route('cervejas.store')}}">
     @elseif ($acao == 2) 
    <form method="post" action="{{route('cervejas.update', $reg->id)}}">
        {!! method_field('put') !!}
    @endif
        {{ csrf_field() }}
        <div class="form-group col-sm-6">
                <label for="nome">Nome da Ceveja:</label>
                <input type="text" class="form-control" id="nome" 
                       name="nome" 
                       value="{{$reg->nome or old('nome')}}"
                       required>
        </div>

        <div class="form-group col-sm-6">
            <label for="copo_id">Copo:</label>
            <select class="form-control" id="copo_id" name="copo_id">
                @foreach ($copos as $copo)    
                <option value="{{$copo->id}}" 
                        @if ((isset($reg) && $reg->copo_id==$copo->id) 
                        or old('copo_id') == $copo->id) selected @endif>
                        {{$copo->nome}}</option>
                @endforeach    
            </select>
        </div>
        <div class="form-group col-sm-6">
            <label for="estilo_id">Estilo:</label>
            <select class="form-control" id="estilo_id" name="estilo_id">
                @foreach ($estilos as $estilo)    
                <option value="{{$estilo->id}}" 
                        @if ((isset($reg) && $reg->estilo_id==$estilo->id) 
                        or old('estilo_id') == $estilo->id) selected @endif>
                        {{$estilo->nome}}</option>
                @endforeach    
            </select>
        </div>
        <div class="form-group col-sm-6">
            <label for="fabricante_id">fabricante:</label>
            <select class="form-control" id="fabricante_id" name="fabricante_id">
                @foreach ($fabricantes as $fabricante)    
                <option value="{{$fabricante->id}}" 
                        @if ((isset($reg) && $reg->fabricante_id==$fabricante->id) 
                        or old('fabricante_id') == $fabricante->id) selected @endif>
                        {{$fabricante->fabricante_name}}</option>
                @endforeach    
            </select>
        </div>
        
        
        <div class="form-group col-sm-3">
            <label for="color_id">Cor:</label>
            <select class="form-control" id="color_id" name="color_id">
                @foreach ($colors as $color)    
                <option style="font-size: 1.5em; background-color: {{$color->Tonalidade}}; color: white;" value="{{$color->id}}">
                        {{$color->nome}}</option>
                @endforeach    
            </select>
        </div>
        

        <div class="form-group col-sm-3">
            <label for="IBU">IBU:</label>
            <input type="number" class="form-control" id="IBU" 
                   name="IBU" 
                   value="{{$reg->IBU or old('IBU')}}"
                   required>
        </div>

        <div class="form-group col-sm-3">
            <label for="ABV">ABV:</label>
            <input type="number" class="form-control" id="ABV" 
                   name="ABV" 
                   value="{{$reg->ABV or old('ABV')}}"
                   required>
        </div>

        <div class="form-group col-sm-3">
            <label for="SRM">SRM:</label>
            <input type="number" class="form-control" id="SRM" 
                   name="SRM" 
                   value="{{$reg->SRM or old('SRM')}}"
                   required>
        </div>

        <div class="form-group col-sm-3">
            <label for="EBC">EBC:</label>
            <input type="number" class="form-control" id="EBC" 
                   name="EBC" 
                   value="{{$reg->EBC or old('EBC')}}"
                   required>
        </div>

        @if($acao == 1 or $acao == 2)
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="reset" class="btn btn-success">Limpar</button>
        @endif
    </form>    
</div>


@stop