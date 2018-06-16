@extends('layouts.template.master')

@section('content')


    <a href="{{ route('setor.create') }}"> </a>
    <br>
    <br>
    <div class="container-fluid">
        <div class="col-md-12">

            <div class="card card-info">
                <div class="card-header">
                    <h5><i class='fa fa-address-card'></i> Cadastrar Setor</h5>
                </div>


    {!! Form::open(['route' => 'setor.store', 'class' => 'form-control']) !!}

    {{--@if ($errors->any())--}}
        {{--<div class="alert alert-danger">--}}
            {{--<ul>--}}
                {{--@foreach ($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--@endif--}}
    @include('setor._form')


    <div class="form-group col-md-5">
    {!! Form::submit('Cadastrar', ['class' => 'btn btn-success']) !!}
    </div>
    {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection

