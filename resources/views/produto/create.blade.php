@extends('layouts.template.master')

@section('content')

    {{--<div class="content-wrapper">--}}
        {{--<!-- Content Header (Page header) -->--}}
        {{--<section class="content-header">--}}
            {{--<h1>--}}
                {{--Informações do Fornecedor--}}
                {{--<small></small>--}}
            {{--</h1>--}}

        {{--</section>--}}

        {{--<div class="col-md-5">--}}
            {{--<!-- general form elements -->--}}
            {{--<div class="box box-primary">--}}
                {{--<div class="box-body">--}}
                    {{--<div class="form-group">--}}
                        {{--<a href="{{ route('fornecedor.create') }}"> </a>--}}
                        {{--<br>--}}
                        {{--<br>--}}

                        {{--@include('errors._errors_form')--}}

                        {{--{!! Form::open(['route' => 'fornecedor.store', 'class' => 'form-control']) !!}--}}

                        {{--@include('fornecedor._form')--}}

                        {{--<div class="form-group col-md-5">--}}
                            {{--{!! Form::submit('Cadastrar fornecedor', ['class' => 'btn btn-info']) !!}--}}
                        {{--</div>--}}
                        {{--{!! Form::close() !!}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}





                <a href="{{ route('produto.create') }}"> </a>
                <br>
                <br>

                {!! Form::open(['route' => 'produto.store', 'class' => 'form-control']) !!}

                @include('produto._form')

                <div class="form-group col-md-5">
                {!! Form::submit('Cadastrar produto', ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}


@endsection

