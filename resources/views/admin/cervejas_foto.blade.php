@extends('layouts.app')

@section('content')


<div class='col-sm-11'>
 
    <h2> inserir foto de Cervejas </h2>

</div>
<div class='col-sm-1'>
    <a href='{{route('cervejas.index')}}' class='btn btn-primary' 
       role='button'> Voltar </a>
</div>

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



<div class='col-sm-12'>
    <form method="post" action="{{route('cervejas.store.foto')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$reg->id}}">
        <div class="form-group">
                <label for="nome">Nome da Ceveja:</label>
                <input type="text" class="form-control" id="nome" 
                       name="nome" 
                       value="{{$reg->nome or old('nome')}}"
                       required>
        </div>

        <div class="form-group">
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
        <div class="form-group">
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
        
        <div class="form-group">
            <label for="color_id">Cor:</label>
            <select class="form-control" id="color_id" name="color_id">
                @foreach ($colors as $color)    
                <option value="{{$color->id}}" 
                        @if ((isset($reg) && $reg->color_id==$color->id) 
                        or old('color_id') == $color->id) selected @endif>
                        {{$color->nome}}</option>
                @endforeach    
            </select>
        </div>

        <div class="form-group">
            <label for="IBU">IBU:</label>
            <input type="text" class="form-control" id="IBU" 
                   name="IBU" 
                   value="{{$reg->IBU or old('IBU')}}"
                   required>
        </div>

        <div class="form-group">
            <label for="ABV">ABV:</label>
            <input type="text" class="form-control" id="ABV" 
                   name="ABV" 
                   value="{{$reg->ABV or old('ABV')}}"
                   required>
        </div>

        <div class="form-group">
            <label for="SRM">SRM:</label>
            <input type="text" class="form-control" id="SRM" 
                   name="SRM" 
                   value="{{$reg->SRM or old('SRM')}}"
                   required>
        </div>

        <div class="form-group">
            <label for="EBC">EBC:</label>
            <input type="text" class="form-control" id="EBC" 
                   name="EBC" 
                   value="{{$reg->EBC or old('EBC')}}"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>

        

<div class="col-sm-3" style="text-align: center">
@php
if (file_exists(public_path('fotos/'.$reg->id.'.jpg'))) {
   $foto = '../fotos/'.$reg->id.'.jpg';
} else {
   $foto = '../images/avatar-placeholder.svg';
}
@endphp
{!!"<img src=$foto id='imagem' height='150' width='200' alt='Foto'>"!!}
<p>
<div class="form-group">
    <label for="foto"> Foto </label>
    <input type="file" id="foto" name="foto" 
           onchange="previewFile()"           
           class="form-control">
</div>
</p>
   </div>
</form>    

<script>
function previewFile() {
    var preview = document.getElementById('imagem');
    var file    = document.getElementById('foto').files[0];
    var reader  = new FileReader();
    
    reader.onloadend = function() {
        preview.src = reader.result;
    };
    
    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }    
}
   
</script>


@endsection