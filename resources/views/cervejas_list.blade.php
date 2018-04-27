@extends('layouts.app')

@section('content')
<div class='col-sm-12'>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Cód.</th>
                <th>nome</th>
                <th>IBU</th>
                <th>ABV</th>
                <th>SRM</th>
                <th>EBC</th>
                <th>Estilo</th>
                <th>Coloração</th>
                <th>Copo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cervejas as $cerveja)
            <tr>
                <td> {{$cerveja->id}} </td>
                <td> {{$cerveja->nome}} </td>
                <td> {{$cerveja->IBU}} </td>
                <td> {{$cerveja->ABV}} </td>
                <td> {{$cerveja->SRM}} </td>
                <td> {{$cerveja->EBC}} </td>
                <td> {{$cerveja->estilo->nome}} </td>
                <td style="background-color: {{$cerveja->color->Tonalidade}};"> {{$cerveja->color->nome}} </td>
                <td> {{$cerveja->copo->nome}} </td>
                <td> <a href="{{route('cervejas.edit', '$cerveja->id')}}"
                class='btn btn-info' 
                role='button'> Alterar </a>
            <form style="display: inline-block"
                  method="post"
                  action="{{route('cervejas.destroy', $cerveja->id)}}"
                  onsubmit="return confirm('Confirma Exclusão?')">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <button type="submit"
                        class="btn btn-danger"> Excluir </button>
            </form>              
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $cervejas->links() }}  
</div>    
               
@endsection