

<div class="card-body">
    <div class="form-group">

        {!! Form::label('nome', 'Nome', ['class' => 'col-sm-2 control-label']) !!}
        {!! Form::text('nome', null, ['class' => 'form-control', 'required']) !!}
        {!! $errors->first('nome', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}


        {!! Form::label('cnpj', 'CNPJ', ['class' => 'col-sm-2 control-label']) !!}
        {!! Form::text('cnpj', null, ['class' => 'form-control', 'required']) !!}
        {!! $errors->first('cnpj', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}


        {!! Form::label('razao_social', 'Razão Social', ['class' => 'col-sm-2 control-label']) !!}
        {!! Form::text('razao_social', null, ['class' => 'form-control', 'required']) !!}
        {!! $errors->first('razao_social', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}

    </div>
</div>
