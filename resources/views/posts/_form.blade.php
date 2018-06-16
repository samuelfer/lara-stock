
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
                    <h3 class="card-title">Informações do Setor</h3>
                </div>

                    <div class="card-body">
                        <div class="form-group">

                            {!! Form::label('nome', 'Nome', ['class' => 'col-sm-2 control-label']) !!}
                            {!! Form::text('nome', null, ['class' => 'form-control', 'required']) !!}

                            {!! Form::label('observacao', 'Observação', ['class' => 'col-sm-2 control-label']) !!}
                            {!! Form::textarea('observacao', null, ['class' => 'form-control']) !!}


                        </div>
                    </div>
            </div>
        </div>
    </div>