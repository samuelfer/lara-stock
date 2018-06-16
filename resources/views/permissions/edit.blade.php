
@extends('layouts.template.master')

@section('content')

    {{ Form::model($permission, ['route' => ['permissions.update', $permission->id], 'class' => 'form', 'method' => 'PUT']) }}

    <div class="container-fluid">
        <div class="col-md-12">

            <div class="card card-info">
                <div class="card-header">
                    <h5><i class='fa fa-user-plus'></i> Editar Permissão</h5>
                </div>

            @include('permissions._form')

    <div class="form-group col-md-5">
        {!! Form::submit('Salvar alterações', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}
        </div>
    </div>
    </div>

@endsection
