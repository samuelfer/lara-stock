
@extends('layouts.template.master')

@section('title', '| Permissions')

@section('content')

<br>
  <!-- Main content -->
  {{--<section class="content">--}}
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Listagem de Permissões</h3><br>
              <a href="{{ route('permissions.create') }}">
                <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left btn btn-success btn-sm">
                  <span class="ui-button-icon-left ui-icon ui-c fa fa-plus-square-o"></span><span
                          class="ui-button-text ui-c"> Novo cadastro</span>
                </button>
                <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Usuários</a>
                <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Perfis</a></h1>
              </a>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">

                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Permissões</th>
                  <th>Operação</th>
                </tr>
                @foreach($permissions as $permission)
                  <tr>
                    <td>{{ $permission->id }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                      <a href="{{route('permissions.edit', ['data' => $permission->id])}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>


                      {!! Form::open(['route' => ['permissions.destroy', $permission->id], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
                      <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      {!! Form::close() !!}

                    </td>


                  </tr>
                  @endforeach
                  </tr>
                  @empty ($permissions->count())
                    <tr class="ui-widget-content ui-datatable-empty-message">
                      <td colspan="12">Nenhum registro encontrado</td>
                    </tr>
                  @endempty
              </table>
              {{--{{ $permissions->links()}}--}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  {{--</section>--}}
  <!-- /.content -->


@endsection
