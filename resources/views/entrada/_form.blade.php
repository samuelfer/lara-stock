
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
                    <h3 class="card-title">Informações da Entrada</h3>
                </div>

                    <div class="card-body">
                        <div class="form-group">

                            {!! Form::label('data', 'Data', ['class' => 'col-sm-2 control-label']) !!}
                            {!! Form::text('data', null, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('data', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}

                            {!! Form::label('nota_fiscal', 'Nota fiscal', ['class' => 'col-sm-2 control-label']) !!}
                            {!! Form::text('nota_fiscal', null, ['class' => 'form-control', 'required']) !!}
                            {!! $errors->first('nota_fiscal', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}

                            {!! Form::label('valor', 'Valor', ['class' => 'col-sm-2 control-label']) !!}
                            {!! Form::text('valor', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('valor', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}

                            {!! Form::label('observacao', 'Observacao', ['class' => 'col-sm-2 control-label']) !!}
                            {!! Form::text('observacao', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('observacao', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}



                        </div>
                    </div>
            </div>
        </div>
    </div>