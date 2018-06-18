@extends('adminlte::page')

@section('title', 'Virtual Pub ADMIN')

@section('content_header')
    @can('isMantenedor')
    <h2> Lista de Estilos de estilo </h2>
    @endcan
    <div class="row">
        <div class="col-xl-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-beer"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">total de Estilos cadastrados</span>
                    <span class="info-box-number">{{ count($estilos) }}</span>
                </div>
               
            </div>
        </div>
    </div>
@stop

@section('content')
        
        @if (session('status'))

        <div class="alert alert-success">
        {{ session('status') }}
        </div>

        @endif
        
   <div class="row">
        <div class='col-sm-1'>
            <a href='{{route('estilos.create')}}' class='btn btn-primary' 
               role='button'> Novo </a>
        </div>
    </div>

    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Hover Data Table</h3>
              </div>
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Cód.</th>
                            <th>nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estilos as $estilo)
                        <tr>
                            <td> {{$estilo->id}} </td>
                            <td> {{$estilo->nome}} </td>
                            
                    
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Ações <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('estilos.edit', $estilo->id) }}"> Alterar </a></li>
                                    </ul>
                                </div>
                                <form style="display: inline-block"method="post" action="{{route('estilos.destroy', $estilo->id)}}" onsubmit="return confirm('Confirma Exclusão?')">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <button type="submit"class="btn btn-danger centered"> Excluir </button>
                                </form>
                            </td>             
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </section> 
@stop

@section('js')
<script>
  $(function () {
    $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true
    })
  })
</script>
@stop