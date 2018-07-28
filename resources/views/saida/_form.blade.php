
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('data', 'Data', ['class' => 'control-label']) !!}
            {!! Form::text('data', null, ['class' => 'form-control form-control-sm', 'placeholder' => '']) !!}
            <small class="help-block">{{{ $errors->first('data', ':message') }}}</small>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('setor_id', 'Cliente', ['class' => 'control-label']) !!}
            {!! Form::text('setor_id', null, ['class' => 'form-control form-control-sm', 'placeholder' => '']) !!}
            <small class="help-block">{{{ $errors->first('setor_id', ':message') }}}</small>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group">
            {!! Form::label('valor', 'Valor Total R$', ['class' => 'control-label']) !!}
            {!! Form::text('valor', null, ['class' => 'form-control form-control-sm', 'placeholder' => '']) !!}
            <small class="help-block">{{{ $errors->first('valor', ':message') }}}</small>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            {!! Form::label('observacao', 'Observação', ['class' => 'control-label']) !!}
            {!! Form::textarea('observacao', null, ['class' => 'form-control form-control-sm', 'placeholder' => '', 'rows'=>'2']) !!}
            <small class="help-block">{{{ $errors->first('observacao', ':message') }}}</small>
        </div>
    </div>

    <hr>

    <div class="form-group col-sm-12">

        <h6 class="box-title"><strong>Por favor informe os itens</strong></h6>
        <hr>
    </div>

    <div class="itens-wrapper col-sm-12">

        <div class="data-itens">
            {!! Form::hidden("detalhe[0][id]", null) !!}
            <div class="row">

                <div class="form-group col-sm-3">
                    {!! Form::select('detalhe[0][produto_id]', $produtos, (isset($entrada)) ? $entrada->produto_id : old('produto_id'), ['class' => 'form-control form-control-sm', 'required', 'placeholder' => 'Selecione']) !!}
                    {{--{!! Form::text("detalhe[0][produto_id]", null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Produto']) !!}--}}
                </div>

                <div class="form-group col-sm-2">
                    {!! Form::select('detalhe[0][tipo_unidade_id]', $tpunidades, (isset($produto)) ? $produto->tipo_unidade_id : old('tipo_unidade_id'), ['class' => 'form-control form-control-sm', 'required', 'placeholder' => 'Selecione']) !!}
                    {{--{!! Form::text("detalhe[0][tipo_unidade_id]", null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Unidade']) !!}--}}
                </div>

                <div class="form-group col-sm-1">
                    {!! Form::text("detalhe[0][quantidade]", null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Qtd']) !!}
                </div>


                {{--<div class="form-group col-sm-2">--}}
                    {{--{!! Form::text("detalhe[0][valor_unitario]", null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Val Unit']) !!}--}}
                {{--</div>--}}

                <div class="form-group col-sm-2">
                    {!! Form::text("detalhe[0][valor_total]", null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Val Tot']) !!}
                </div>

                <div class="form-group col-sm-2">
                    <button type="button" class="js-remove-itens btn btn-sm btn-danger btn-outline bootstrap-touchspin-up" title="Remover Linha">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>

            </div>
        </div>


        <div class="row">
            <div class="form-group col-sm-12">
                <button class="js-add-itens btn btn-sm btn-info btn-outline bootstrap-touchspin-up"
                        type="button" title="Adicionar Linha"> Adicionar Linha
                </button>
            </div>
        </div>
    </div>
</div>

@section('scripts')

    <script>

        // Criando os campos
        $('.itens-wrapper').on('click', '.js-add-itens', function() {

            var n = $('.data-itens').length;
            console.log(n);

            var detalheItem = $('<div class="data-itens">' +
                '<input name="detalhe['+n+'][id]" ' +
                'type="hidden">' +
                '<div class="row">' +
                '<div class="form-group col-sm-3">' +
                '<input class="form-control form-control-sm" placeholder="Produto" ' +
                'name="detalhe['+n+'][produto_id]" type="text" id="detalhe['+n+'][produto_id]">' +
                '</div>' +
                '<div class="form-group col-sm-2">' +
                '<input class="form-control form-control-sm" placeholder="Unidade" ' +
                'name="detalhe['+n+'][tipo_unidade_id]" type="text" id="detalhe['+n+'][tipo_unidade_id]">' +
                '</div>' +
                '<div class="form-group col-sm-1">' +
                '<input class="form-control form-control-sm" placeholder="Qtd" ' +
                'name="detalhe['+n+'][quantidade]" type="text" id="detalhe['+n+'][quantidade]">' +
                '</div>' +

                // '<div class="form-group col-sm-2">' +
                // '<input class="form-control form-control-sm" placeholder="Val Unit" ' +
                // 'name="detalhe['+n+'][valor_unitario]" type="text" id="detalhe['+n+'][valor_unitario]">' +
                // '</div>' +
                '<div class="form-group col-sm-2">' +
                '<input class="form-control form-control-sm" placeholder="Val Tot" ' +
                'name="detalhe['+n+'][valor_total]" type="text" id="detalhe['+n+'][valor_total]">' +
                '</div>' +
                '<div class="form-group col-sm-2">' +
                '<button type="button" class="js-remove-itens btn btn-sm btn-danger ' +
                'btn-outline bootstrap-touchspin-up" ' +
                'title="Remover Linha"><i class="fa fa-trash"></i></button>' +
                '</div>' +
                '</div>' +
                '</div>');
            n++;

            detalheItem.hide();

            $('.itens-wrapper .data-itens:last').after(detalheItem);

            detalheItem.fadeIn('fast');

            return false;
        });

        $('.itens-wrapper').on('click', '.js-remove-itens', function(){
            var n = $('.data-itens').length;
            if (n > 1){
                $(this).parents('.data-itens').remove();
                n--;
            }
            return false;
        });

    </script>

@endsection