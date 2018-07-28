
<div class="box-header with-border">
    <h3 class="box-title">Produto</h3>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                {!! Form::label('nome', 'Nome*') !!}
                {!! Form::text('nome', null, ['class' => 'form-control form-control-sm', 'required']) !!}
                {!! $errors->first('nome', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
            </div>
        </div>

        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                {!! Form::label('descricao', 'Descricao') !!}
                {!! Form::text('descricao', null, ['class' => 'form-control form-control-sm', 'required']) !!}
                {!! $errors->first('descricao', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                {!! Form::label('fornecedor_id', 'Fornecedor') !!}
                {!! Form::select('fornecedor_id', $fornecedores, (isset($produto)) ? $produto->fornecedor_id : old('fornecedor_id'), ['class' => 'form-control form-control-sm', 'required', 'placeholder' => 'Selecione']) !!}
                {!! $errors->first('fornecedor_id', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                {!! Form::label('peso', 'Peso') !!}
                {!! Form::text('peso', null, ['class' => 'form-control form-control-sm', 'required']) !!}
                {!! $errors->first('peso', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                {!! Form::label('volume', 'Volume') !!}
                {!! Form::text('volume', null, ['class' => 'form-control form-control-sm', 'required']) !!}
                {!! $errors->first('volume', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                {!! Form::label('tipo_unidade_id', 'Tipo unidade') !!}
                {!! Form::select('tipo_unidade_id', $tpunidades, (isset($produto)) ? $produto->tipo_unidade_id : old('tipo_unidade_id'), ['class' => 'form-control form-control-sm', 'required', 'placeholder' => 'Selecione']) !!}
                {!! $errors->first('tipo_unidade_id', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
            </div>
        </div>

        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                {!! Form::label('categoria_id', 'Categoria') !!}
                {!! Form::select('categoria_id', $categorias, (isset($produto)) ? $produto->categoria_id : old('categoria_id'), ['class' => 'form-control form-control-sm', 'required', 'placeholder' => 'Selecione']) !!}
                {!! $errors->first('categoria_id', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
            </div>
        </div>
    </div>
</div>

@section('scripts')

    <script>
        $('input[name="peso"]').mask('##.##0,00', {reverse: true});
    </script>
@endsection