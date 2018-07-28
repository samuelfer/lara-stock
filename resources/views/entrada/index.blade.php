
@extends('layouts.template.master')

@section('content')

  <br>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">


              <h3 class="card-title">Listagem de Entrada</h3><br>
              <a href="{{ route('entrada.create') }}">
                <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left btn btn-success btn-sm">
                  <span class="ui-button-icon-left ui-icon ui-c fa fa-plus-square-o"></span><span
                          class="ui-button-text ui-c"> Novo cadastro</span>
                </button>
              </a>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Data</th>
                  <th>Valor</th>
                  <th>Observação</th>
                  <th>Ações</th>
                </tr>
                @foreach($data as $datum)
                  <tr>
                    <td>{{$datum->id}}</td>
                    <td>{{$datum->data}}</td>
                    <td>{{$datum->valor}}</td>
                    <td>{{$datum->observacao}}</td>
                    <td><a href="{{route('entrada.edit', ['data' => $datum->id])}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(['route' => ['entrada.destroy', $datum->id], 'method' => 'DELETE', 'style' => 'display:inline']) }}
                         <button class="btn-danger btn-sm btn-outline bootstrap-touchspin-u">
                           <i class="fa fa-trash"></i>
                         </button>
                      {{ Form::close() }}

                    </td>

                  </tr>
                  @endforeach
                  </tr>
                  @empty ($data->count())
                    <tr class="ui-widget-content ui-datatable-empty-message">
                      <td colspan="12">Nenhum registro encontrado</td>
                    </tr>
                  @endempty
              </table>
              {{ $data->links()}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->


@endsection
