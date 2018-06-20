
<div class="card-body">
    <div class="form-group">

        {!! Form::label('nome', 'Nome', ['class' => 'col-sm-12 control-label']) !!}
        {!! Form::text('nome', null, ['class' => 'form-control', 'required']) !!}
        {!! $errors->first('name', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}

        {!! Form::label('observacao', 'Observação', ['class' => 'col-sm-12 control-label']) !!}
        {!! Form::textarea('observacao', null, ['class' => 'form-control']) !!}
        {!! $errors->first('observacao', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}

    </div>
</div>