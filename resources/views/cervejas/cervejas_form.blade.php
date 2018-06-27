@extends('adminlte::page')

@section('title', 'Virtual-Pub | formulário de cervejas')

@section('content_header')
<div class="row">
    <div class='col-sm-11'>

    </div>
    <div class='col-sm-1'>
        <a href='{{route('cervejas.index')}}' class='btn btn-primary' 
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
                    <h3 class="box-title"> Inclusão de Cervejas </h3>
                    @elseif ($acao == 2) 
                    <h3 class="box-title"> Alteração de Cervejas </h3>
                    @else
                    <h3 class="box-title"> Consulta Cerveja </h3>
                    @endif
            </div>
            
        @if ($acao == 1)
            <form method="post" action="{{route('cervejas.store')}}">
        @elseif ($acao == 2) 
            <form method="post" action="{{route('cervejas.update', $reg->id)}}">
            {!! method_field('put') !!}
        @endif
            {{ csrf_field() }}
                <div class="box-body">

                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="nome">Nome da Ceveja:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{$reg->nome or old('nome')}}"required>
                        </div>
                        @can('isFabricante')
                        <div class="form-group col-sm-12">
                            <input type="hidden" class="form-control" id="fabricante_id" name="fabricante_id" value="{{$fabricante->id or old('fabricante_id')}}"required>
                        </div>
                        @endcan
                    </div>

                    <div class="row">   
                        <div class="form-group col-sm-12">
                            <label for="copo_id">Copo:</label>
                            <select class="form-control select2" style="whidth: 100%;" id="copo_id" name="copo_id">
                                @foreach ($copos as $copo)    
                                <option value="{{$copo->id}}" @if ((isset($reg) && $reg->copo_id==$copo->id) or old('copo_id') == $copo->id) selected @endif>
                                    {{$copo->nome}}
                                </option>
                                @endforeach    
                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <label for="estilo_id">Estilo:</label>
                            <select class="form-control select2" style="whidth: 100%;" id="estilo_id" name="estilo_id">
                                @foreach ($estilos as $estilo)    
                                <option value="{{$estilo->id}}" @if ((isset($reg) && $reg->estilo_id==$estilo->id) or old('estilo_id') == $estilo->id) selected @endif>
                                    {{$estilo->nome}}
                                </option>
                                @endforeach    
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="color_id">Cor:</label>
                            <select class="form-control select2" style="whidth: 100%;" id="color_id" name="color_id">
                                @foreach ($colors as $color)    
                                    <option value="{{$color->id}}" @if ((isset($reg) && $reg->color_id==$color->id) or old('color_id') == $color->id) selected @endif>
                                        {{$color->nome}}
                                    </option>
                                @endforeach    
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                    @can('isMantenedor')
                        <div class="form-group col-sm-12">
                            <label for="fabricante_id">fabricante:</label>
                            <select class="form-control select2" style="whidth: 100%;" id="fabricante_id" name="fabricante_id">
                                @foreach ($fabricantes as $fabricante) 
                                    <option value="{{$fabricante->id}}" 
                                        @if ((isset($reg) && $reg->fabricante_id==$fabricante->id) or old('fabricante_id') == $fabricante->id)
                                         selected
                                         @endif>
                                        {{$fabricante->fabricante_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endcan
                    @can('isFabricante')
                    <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{$user->id or old('id')}}"required>
                    @endcan    
                    </div>
                   
                    <div class="row col-sm-12">
                    <div class="form-group col-sm-3">
                        <label for="IBU">IBU:</label>
                        <input type="number" class="form-control" id="IBU" name="IBU" value="{{$reg->IBU or old('IBU')}}" required>
                    </div>
    
                    <div class="form-group col-sm-3">
                        <label for="ABV">ABV:</label>
                        <input type="number" class="form-control" id="ABV" name="ABV" value="{{$reg->ABV or old('ABV')}}" required>
                    </div>
    
                    <div class="form-group col-sm-3">
                        <label for="SRM">SRM:</label>
                        <input type="number" class="form-control" id="SRM"  name="SRM"  value="{{$reg->SRM or old('SRM')}}" required>
                    </div>
                
                    <div class="form-group col-sm-3">
                        <label for="EBC">EBC:</label>
                        <input type="number" class="form-control" id="EBC" name="EBC" value="{{$reg->EBC or old('EBC')}}" required>
                    </div>
                </div>
                    <div class="form-group col-sm-12">
                            <label>Descrição</label>
                            <textarea class="form-control" name="descricao" rows="5" placeholder="enter" request>{{$reg->descricao or old('descricao')}}</textarea>
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