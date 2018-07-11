
@extends('layouts.template.master')

@section('content')

    {{ Form::model($permission, ['route' => ['permissions.update', $permission->id], 'class' => 'form', 'method' => 'PUT']) }}

            @include('permissions._form')

    <div class="form-group col-md-5">
        {!! Form::submit('Salvar alterações', ['class' => 'btn btn-success btn-sm']) !!}
    </div>
    {!! Form::close() !!}
@endsection
