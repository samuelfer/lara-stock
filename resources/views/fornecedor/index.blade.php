
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
                    <h3 class="card-title">Listagem de Fornecedores</h3><br>
                    <a href="{{ route('fornecedor.create') }}">
                        <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left btn btn-success btn-sm">
                            <span class="ui-button-icon-left ui-icon ui-c fa fa-plus-square-o"></span><span
                                    class="ui-button-text ui-c"> Novo cadastro</span>
                        </button>
                    </a>


                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CNPJ</th>
                            <th>Razão Social</th>
                            <th>Ações</th>
                        </tr>
                        @foreach($data as $datum)
                        <tr>
                            <td>{{$datum->id}}</td>
                            <td>{{$datum->nome}}</td>
                            <td>{{$datum->cnpj}}</td>
                            <td>{{$datum->razao_social}}</td>
                            <td><a href="{{route('fornecedor.edit', ['data' => $datum->id])}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>

                                   {{ Form::open(['route' => ['fornecedor.destroy', $datum->id], 'method' => 'DELETE', 'style' => 'display:inline']) }}

                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

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
