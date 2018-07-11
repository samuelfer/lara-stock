@extends('layouts.template.master')
@section('content')
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="text-center">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Oops:
                        <small>Você não tem essa autorização - <b>Erro 401</b></small>
                    </h3>
                </div>
                <div class="panel-body">
                    <center><p>Desculpe, você não pode realizar essa tarefa no sistema</p></center>
                </div>
            </div>
        </div>
        <div class="col-md-2">

        </div>
    </div>
    {{--<p><a href="#"target="_blank">LaraEstoque.</a></p>--}}

</div>
    @endsection