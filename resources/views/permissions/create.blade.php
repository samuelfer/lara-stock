@extends('layouts.template.master')

@section('content')

    <a href="{{ route('permissions.create') }}"> </a>


                {!! Form::open(['route' => 'permissions.store', 'class' => 'form-control']) !!}

                @include('permissions._form')

                <div class="form-group col-md-5">
                    {!! Form::submit('Cadastrar permissão', ['class' => 'btn btn-success btn-sm']) !!}
                </div>
                {!! Form::close() !!}

@endsection

