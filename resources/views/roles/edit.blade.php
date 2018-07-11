@extends('layouts.template.master')

@section('content')


    {{--<div class="container-fluid">--}}
        {{--<div class="col-md-12">--}}

            {{--<div class="card card-info">--}}
                {{--<div class="card-header">--}}
                    {{--<h5><i class='fa fa-user-plus'></i> Editar Perfil</h5>--}}
                {{--</div>--}}
                {!! Form::model($role, ['route' => ['roles.update','role' => $role->id], 'class' => 'form', 'method' => 'PUT']) !!}

                @include('roles._form')

                <div class="form-group col-md-5">
                    {!! Form::submit('Salvar alterações', ['class' => 'btn btn-success btn-sm']) !!}
                </div>
                {!! Form::close() !!}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@endsection

