@extends('layouts.template.master')

@section('title', '| Create New Post')

@section('content')
    <div class="container-fluid">
        <div class="col-md-12">

            <h1>Criar Novo Post</h1>

            <hr>

            {{-- Using the Laravel HTML Form Collective to create our form --}}
            {{ Form::open(array('route' => 'posts.store')) }}

            <div class="form-group">
                {{ Form::label('title', 'Título') }}
                {{ Form::text('title', null, array('class' => 'form-control')) }}
                {!! $errors->first('title', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
                <br>

                {{ Form::label('body', 'Texto') }}
                {{ Form::textarea('body', null, array('class' => 'form-control')) }}
                {!! $errors->first('body', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
                <br>

                {{ Form::submit('Cadastrar', array('class' => 'btn btn-success btn-lg btn-block')) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection

