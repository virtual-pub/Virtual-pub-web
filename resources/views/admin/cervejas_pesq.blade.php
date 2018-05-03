@extends('layouts.app')

@section('content')
<div class='col-sm-12'>
    <div class='col-sm-11'>
        <h2> Pesquisa de Cervejas </h2>
    </div>
    <div class='col-sm-1'>
        <br>
        <a href='{{route('cervejas.search')}}' class='btn btn-primary' 
           role='button'> Ver Todos </a>
    </div>

    <form method="post" action="{{route('cervejas.filtro')}}">
        {{ csrf_field() }}

        <div class="col-sm-6">
            <div class="form-group">
                <label for="nome"> Nome da Cerveja </label>
                <input type="text" id="nome" name="nome" class="form-control">
            </div>
        </div>

        <div class="col-sm-5">
            <div class="form-group">
                <label for="IBU"> IBU Máximo </label>
                <input type="text" id="IBU" name="IBU" class="form-control">
            </div>
        </div>

        <div class="col-sm-1">
            <div class="form-group">
                <label> &nbsp; </label>
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
        </div>
    </form>

    @if (count($cervejas)==0)
    <div class="col-sm-12">
        <div class="alert alert-success">
            Não há cervejas com o filtro definido
        </div>
    </div>
    @endif

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Cód.</th>
                <th>img</th>
                <th>nome</th>
                <th>IBU</th>
                <th>ABV</th>
                <th>SRM</th>
                <th>EBC</th>
                <th>Estilo</th>
                <th>Coloração</th>
                <th>Copo</th>
                <th>ativado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cervejas as $cerveja)
            @php
                if (file_exists(public_path('fotos/'.$cerveja->id.'.jpg'))) {
                    $foto = '../fotos/'.$cerveja->id.'.jpg';
                } else {
                    $foto = '../images/avatar-placeholder.svg';
            }
            @endphp
            <tr>
                <td> {{$cerveja->id}} </td>
                <td><img src="{{$foto}}" alt="{{$cerveja->nome}}" style="width:10%"></td>
                <td> {{$cerveja->nome}} </td>
                <td> {{$cerveja->IBU}} </td>
                <td> {{$cerveja->ABV}} </td>
                <td> {{$cerveja->SRM}} </td>
                <td> {{$cerveja->EBC}} </td>
                <td> {{$cerveja->estilo->nome}} </td>
                <td> <div class="pull-left cor" style="background-color: {{$cerveja->color->Tonalidade}}"></div><p>{{$cerveja->color->nome}}</p></td>
                <td> {{$cerveja->copo->nome}} </td>
                <td> <input type="checkbox" value="" id="{{ $cerveja->id }}"
                            onclick="window.location.href ='{{route('cervejas.ativar', $cerveja->id)}}'" 
                            style="width:25px; height:25px"> </td>
        <script>
            document.getElementById(<?= $cerveja->id ?>).checked = (<?= $cerveja->ativo === 1 ?>);
        </script>
                <td>
                <a href="{{ route('cervejas.show', $cerveja->id) }}" 
              class="btn btn-info btn-sm" role="button">Consultar</a>
                <a href="{{ route('cervejas.edit', $cerveja->id) }}" class='btn btn-warning btn-sm' role='button'> Alterar </a>
                <a href="{{ route('cervejas.foto', $cerveja->id) }}" class='btn btn-success btn-sm' role='button'> Foto </a>
                <form style="display: inline-block"
                  method="post"
                  action="{{route('cervejas.destroy', $cerveja->id)}}"
                  onsubmit="return confirm('Confirma Exclusão?')">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <button type="submit"
                        class="btn btn-danger btn-lg"> Excluir </button>
            </form>              
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $cervejas->links() }}  
</div>    
               
@endsection