@extends('layouts.template.master')

@section('title', '| Roles')

@section('content')

  <!-- Main content -->
  <br>
  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">


              <h3 class="card-title">Listagem de Perfis</h3><br>
              <a href="{{ route('roles.create') }}">
                <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left btn btn-success btn-sm">
                  <span class="ui-button-icon-left ui-icon ui-c fa fa-plus-square-o"></span><span
                          class="ui-button-text ui-c"> Novo cadastro</span>
                </button>
              </a>
              <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Usuários</a>
              <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissões</a></h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Perfil</th>
                  <th>Permissão</th>
                  <th>Operação</th>
                </tr>
                @foreach ($roles as $role)
                  <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>

                    <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a roles and convert to string --}}
                    <td>
                      <a href="{{route('roles.edit', ['role' => $role->id])}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                      {{ Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'DELETE', 'style' => 'display:inline']) }}
                      <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      {{ Form::close() }}

                    </td>

                  </tr>
                  @endforeach
                  </tr>
                  @empty ($roles->count())
                    <tr class="ui-widget-content ui-datatable-empty-message">
                      <td colspan="12">Nenhum registro encontrado</td>
                    </tr>
                  @endempty
              </table>
              {{--{{ $roles->links()}}--}}
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

