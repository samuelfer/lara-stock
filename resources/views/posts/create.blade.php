@extends('layouts.template.master')

@section('content')
    <a href="{{ route('posts.create') }}"> </a>
    <br>
    <br>
    <div class="container-fluid">
        <div class="col-md-12">

            <div class="card card-info">
                <div class="card-header">
                    <h5><i class='far fa-newspaper'></i> Cadastrar Post</h5>
                </div>
                {!! Form::open(['route' => 'posts.store', 'class' => 'form-control']) !!}

                @include('posts._form')

                <div class="form-group col-md-5">
                    {!! Form::submit('Cadastrar', ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    </div>

@endsection

