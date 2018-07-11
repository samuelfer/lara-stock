<div class="box-header with-border">
    <h3 class="box-title">Saída de Produto</h3>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                    {!! Form::label('data', 'Data', ['class' => 'col-md-5 control-label']) !!}
                    {!! Form::text('data', null, ['class' => 'form-control col-md-5', 'required']) !!}
                    {!! $errors->first('data', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                    {!! Form::label('valor', 'Valor') !!}
                    {!! Form::text('valor', null, ['class' => 'form-control form-control-sm', 'required']) !!}
                    {!! $errors->first('valor', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                {!! Form::label('setor_id', 'Setor') !!}
                {!! Form::text('setor_id', null, ['class' => 'form-control cform-control-sm', 'required']) !!}
                {!! $errors->first('setor_id', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="form-group">
                {!! Form::label('observacao', 'Observação') !!}
                {!! Form::textarea('observacao', null, ['class' => 'form-control form-control-sm', 'rows=2', 'required']) !!}
                {!! $errors->first('observacao', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
            </div>
        </div>
    </div>
</div>