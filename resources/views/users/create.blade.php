@extends('layouts.template.master')

@section('content')

    <a href="{{ route('users.create') }}"> </a>
    {{--<br>--}}
    {{--<br>--}}
    {{--<div class="container-fluid">--}}
        {{--<div class="col-md-12">--}}

            {{--<div class="card card-info">--}}
                {{--<div class="card-header">--}}
                    {{--<h5><i class='fa fa-user-plus'></i> Cadastrar Usuário</h5>--}}
                {{--</div>--}}

                {!! Form::open(['route' => 'users.store', 'class' => 'form-control']) !!}

                @include('users._form')

                <div class="form-group col-md-5">
                    {!! Form::submit('Cadastrar', ['class' => 'btn btn-success btn-sm']) !!}
                </div>
                {!! Form::close() !!}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection

