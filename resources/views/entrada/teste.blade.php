
@extends('layouts.template.master')

@section('content')

<div class="formacoes-form">

    <div class="row">
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                {{ Form::label("formacoes[curso]", "Nome do Curso") }}
                <div class="form-group has-feedback {{ $errors->has("formacoes.curso") ? 'has-error' : '' }}">
                    {{ Form::text("formacoes[0][curso]", (isset($data->escolaridades)) ? $data->escolaridades->curso : old("formacoes[curso]"),
                     ['class' => 'form-control', 'placeholder' => 'Nome do Curso']) }}
                    {!! $errors->first("formacoes.curso", '<span class="help-block"><strong>:message</strong></span>') !!}
                </div>
            </div>
        </div>
        {{--<div class="col-md-4 col-lg-4">--}}
            {{--<div class="form-group">--}}
                {{--{!! Form::label("formacoes[formacoes_id]", "Formação") !!}--}}
                {{--<div class="form-group has-feedback {{ $errors->has("formacoes.formacoes_id") ? 'has-error' : '' }}">--}}
                    {{--{!! Form::select( "formacoes[0][formacoes_id]", $formacoes, (isset($data->escolaridades->tipos_escolaridades)) ? $data->escolaridades->tipos_escolaridades->id : old("formacoes[formacoes_id]"),--}}
                     {{--['class' => 'form-control', 'placeholder' => 'Escolha uma formação']) !!}--}}
                    {{--{!!  $errors->first("formacoes.formacoes_id", '<span class="help-block"><strong>:message</strong></span>') !!}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="col-md-12 col-lg-12">
            <div class="form-group">
                {{ Form::label("formacoes[descricao]", "Descrição") }}
                <div class="form-group has-feedback {{ $errors->has('formacoes[descricao]') ? 'has-error' : '' }}">
                    {{ Form::textarea('formacoes[0][descricao]', (isset($data)) ? $data->observacoes : old('formacoes[descricao]'), ['class' => 'form-control',  'placeholder' => 'Descrição do Curso','cols' => '3', 'rows' => '3'])}}
                    {{ $errors->first('formacoes[descricao]', '<span class="help-block"><strong>:message</strong></span>') }}
                </div>
            </div>
        </div>

        <div class="col-md-2">
            <div class="form-group">
                <button type="submit" id="adicionar-formacao" class="btn btn-primary">Adicionar</button>
            </div>
        </div>

        <div class="formacoes-salvar"></div>

    </div>

</div>{{-- .pf-form --}}


@endsection

@section('scripts')
    <script>
        var id = 1;
        $('#adicionar-formacao').on('click', function (event) {
            //console.log('samuel chegou');
            event.preventDefault();
            var form = $('form').serializeArray();


            var tbody = $('tbody');
            tbody.find('.vazia').remove();
            var table = '<tr>';
            $.each(form, function (index, value) {
                switch (value.name) {
                    case "formacoes[0][curso]":
                        $('<input>').attr({
                            type: 'hidden',
                            name: 'formacoes[' + id + '][curso]',
                            value: value.value
                        }).appendTo('.formacoes-salvar');
                        $('input[name="' + value.name + '"]').val('');
                        table += '<td>' + value.value + '</td>';
                        break;
                    case "formacoes[0][formacoes_id]":
                        $('<input>').attr({
                            type: 'hidden',
                            name: 'formacoes[' + id + '][formacoes_id]',
                            value: value.value
                        }).appendTo('.formacoes-salvar');
                        var formacao = $('select[name="' + value.name + '"] option:selected').text();
                        var formacaoVal = $('select[name="' + value.name + '"] option:selected').val();
                        if(formacaoVal == '') {
                            formacao = formacaoVal;
                        }
                        $('select[name="' + value.name + '"]').prop('selectedIndex', 'selected');
                        table += '<td>' + formacao + '</td>';
                        break;
                    case "formacoes[0][descricao]":
                        $('<input>').attr({
                            type: 'hidden',
                            name: 'formacoes[' + id + '][descricao]',
                            value: value.value
                        }).appendTo('.formacoes-salvar');
                        $('textarea[name="' + value.name + '"]').val('');
                        table += '<td>' + value.value + '</td>';
                        break;
                }
            });

            var remove = "<a id='" + id + "' class='remove-formacao' href='#javascript'><i class='glyphicon glyphicon-trash icon-spacer'></i></a>";

            // var edita = "<a id='" + id + "' class='edita-formacao' href='#javascript'><i class='glyphicon glyphicon-edit'></i></a>";

            table += '<td align="center">' + remove + '</td>';
            table += '</tr>';
            tbody.append(table);

            $('.remove-formacao').on('click', function (event) {
                swal({
                    title: 'Você tem certeza?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, pode deletar!'
                }).then((result) => {
                    if (result.value) {
                        var idRemove = $(this).attr('id');
                        $(this).closest('tr').remove();
                        $('input[name="formacoes[' + idRemove + '][curso]"]').remove();
                        $('input[name="formacoes[' + idRemove + '][formacoes_id]"]').remove();
                        $('input[name="formacoes[' + idRemove + '][descricao]"]').remove();
                        swal({
                            title: "Pronto! Formação removida.",
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok'
                        });
                    } else {
                        swal(
                            "Ok!",
                            "Não se preocupe, nada foi alterado.",
                            "error"
                        );
                    }
                });
            });
            id = Number(id) + 1;
        });

    </script>

@endsection