@extends('layouts.template.master')

@section('content')
    <a href="{{ route('posts.create') }}"> </a>
    <br>
    <br>
    <div class="container-fluid">
        <div class="col-md-12">


                {!! Form::open(['route' => 'posts.store', 'class' => 'form-control']) !!}

                @include('posts._form')

                <div class="form-group col-md-5">
                    {!! Form::submit('Cadastrar', ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}

        </div>
    </div>
    </div>

@endsection

