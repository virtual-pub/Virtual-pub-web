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
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $cervejas->links() }}  
</div>    
               
@endsection