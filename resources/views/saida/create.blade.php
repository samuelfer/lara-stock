@extends('layouts.template.master')

@section('content')

                <a href="{{ route('saida.create') }}"> </a>
                <br>
                <br>

                {!! Form::open(['route' => 'saida.store', 'class' => 'form-control']) !!}

                @include('saida._form')

                <div class="form-group col-md-5">
                {!! Form::submit('Cadastrar saída', ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}


@endsection

