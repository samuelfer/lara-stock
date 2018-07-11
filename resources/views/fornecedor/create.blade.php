@extends('layouts.template.master')

@section('content')

<a href="{{ route('fornecedor.create') }}"> </a>
<br>
<br>
<div class="container-fluid">
    <div class="col-md-12">

        <div class="card card-info">
            <div class="card-header">
                <h5><i class='fa fa-user-plus'></i> Cadastrar Fornecedor</h5>
            </div>

            {!! Form::open(['route' => 'fornecedor.store', 'class' => 'form-control']) !!}

            @include('fornecedor._form')

            <div class="form-group col-md-5">
                {!! Form::submit('Cadastrar fornecedor', ['class' => 'btn btn-success btn-sm']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection

