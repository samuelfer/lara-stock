
@extends('layouts.template.master')

@section('content')

    <a href="{{ route('roles.create') }}"> </a>
    <br>
    <br>
    <div class="container-fluid">
        <div class="col-md-12">

            <div class="card card-info">
                <div class="card-header">
                    <h5><i class='fa fa-key'></i> Cadastrar Perfil</h5>
                </div>

                {!! Form::open(['route' => 'roles.store', 'class' => 'form-control']) !!}

                @include('roles._form')

                <div class="form-group col-md-5">
                    {!! Form::submit('Cadastrar', ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection

