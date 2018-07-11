<div class="box-header with-border">
    <h3 class="box-title">Setor</h3>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                {!! Form::label('nome', 'Nome') !!}
                {!! Form::text('nome', null, ['class' => 'form-control form-control-sm', 'required']) !!}
                {!! $errors->first('nome', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}

            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="form-group">
                {!! Form::label('observacao', 'Observação') !!}
                {!! Form::textarea('observacao', null, ['class' => 'form-control form-control-sm', 'rows=2']) !!}
                {!! $errors->first('observacao', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}

            </div>
        </div>
    </div>
</div>