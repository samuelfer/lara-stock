@extends('layouts.template.master')

@section('content')

    <a href="{{ route('permissions.create') }}"> </a>
    <br>
    <br>
    <div class="container-fluid">
        <div class="col-md-12">

            <div class="card card-info">
                <div class="card-header">
                    <h5><i class='fa fa-unlock-alt'></i> Cadastrar Permissão</h5>
                </div>

                {!! Form::open(['route' => 'permissions.store', 'class' => 'form-control']) !!}

                @include('permissions._form')

                <div class="form-group col-md-5">
                    {!! Form::submit('Cadastrar permissão', ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection

