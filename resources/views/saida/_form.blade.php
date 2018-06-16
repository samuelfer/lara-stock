
    {{--<div class="card-body">--}}
        {{--<div class="form-group">--}}
            {{--<div class="form-group col-md-8">--}}
                {{--{!! Form::label('nome', 'Nome', ['class' => 'col-sm-2 control-label']) !!}--}}
                {{--{!! Form::text('nome', null, ['class' => 'form-control', 'required']) !!}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container-fluid">
        <div class="col-md-12">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Informações da Saída</h3>
                </div>

                    <div class="card-body">
                        <div class="form-group">

                            {!! Form::label('data', 'Data', ['class' => 'col-sm-2 control-label']) !!}
                            {!! Form::text('data', null, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('data', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}

                            {!! Form::label('valor', 'Valor', ['class' => 'col-sm-2 control-label']) !!}
                            {!! Form::text('valor', null, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('valor', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}

                            {!! Form::label('setor_id', 'Setor', ['class' => 'col-sm-2 control-label']) !!}
                            {!! Form::text('setor_id', null, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('setor_id', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}

                            {!! Form::label('observacao', 'Observação', ['class' => 'col-sm-2 control-label']) !!}
                            {!! Form::textarea('observacao', null, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('observacao', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}


                        </div>
                    </div>
            </div>
        </div>
    </div>