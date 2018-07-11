
<div class="box-header with-border">
    <h3 class="box-title">Fornecedor</h3>
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
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                {!! Form::label('cnpj', 'CNPJ') !!}
                {!! Form::text('cnpj', null, ['class' => 'form-control form-control-sm', 'required']) !!}
                {!! $errors->first('cnpj', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                {!! Form::label('razao_social', 'Razão Social') !!}
                {!! Form::text('razao_social', null, ['class' => 'form-control form-control-sm', 'required']) !!}
                {!! $errors->first('razao_social', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
            </div>
        </div>
    </div>
</div>
