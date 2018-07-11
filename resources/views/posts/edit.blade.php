
@extends('layouts.template.master')

@section('title', '| Edit Post')

@section('content')
    <div class="row">

        <div class="container-fluid">
            <div class="col-md-12">
            <h1>Edit Post</h1>
            <hr>
            {{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}
            <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', null, array('class' => 'form-control ')) }}<br>

                {{ Form::label('body', 'Post Body') }}
                {{ Form::textarea('body', null, array('class' => 'form-control')) }}<br>

                {{ Form::submit('Save', array('class' => 'btn btn-primary btn-sm')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
    </div>
@endsection