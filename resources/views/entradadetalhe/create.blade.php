@extends('layouts.template.master')

@section('content')


                <a href="{{ route('entradadetalhe.create') }}"> </a>
                <br>
                <br>

                {!! Form::open(['route' => 'entradadetalhe.store', 'class' => 'form-control']) !!}

                @include('entradadetalhe._form')

                <div class="form-group col-md-5">
                {!! Form::submit('Inserir', ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}


@endsection


<script>

    var max_fields 		= 10;	//max de 15 inscricoes de cada vez
    var x = 1;
    $('#add_field').click (function(e) {
        e.preventDefault();	//prevenir novos clicks
        if (x < max_fields) {
            $('#listas').append('\
					<tr class="remove' + x + '"><td><input type="text" name="nome[]" id="nome"></td>\
					<td><input type="text" name="dta_nasc[]" id="dta_nasc" placeholder="yyyy-mm-dd"></td>\
					<td>\
						Sim&nbsp;<input type="radio" value="1" name="cool['+ x +']">&nbsp;\
						N&atilde;o&nbsp;<input type="radio" value="0" name="cool['+ x +']" checked>&nbsp;\
					</td>\
					<td><a href="#" class="remove_campo" id="remove' + x +'">X</a></td>\
			');
            x++;
        }
    });

    //this is not the best move, because will create overhead...
    //but is for simplicity
    //damn users
    $('#listas').on("click",".remove_campo",function(e) {

        e.preventDefault();
        //tr id will be the same as the image
        var tr = $(this).attr('id');
        //alert ('remove: ' + tr);
        $('#listas tr.'+ tr).remove();
        x--;
    });
</script>

<style>
    body {
        font-family: 'Lato';
        font-size: 16px;
        background-color: rgb(245,250,250);
        color: #161616;
    }

    input[type=button] {
        width: 180px;
        height: 30px;
        background-color: rgb(109, 146, 155);
        color: white;
        font-family: Lato;
        padding-left: auto;
        padding-right: auto;
        text-align: center;
        font-size: 18px;
        border-style: solid;
        border-width: thin;
        border-color: rgb(193, 218, 214);
        border-radius: 3px;
    }

    table {
        font-family: Lato;
        font-size: 18px;
        position: fixed;
        border-collapse: collapse;

        color: #3B3738;
        background-color: rgb(193,218,214);
        width: 1150px;

        border-radius: 3px;

        border-style: solid;
        border-width: thin;


        border-top-color: rgb(193,218,214);
        border-left-color: rgb(193,218,214);
        border-bottom-color: rgb(193,218,214);
        border-right-color: rgb(193,218,214);
        zoom: 1;
        filter: alpha(opacity=95);
        opacity: 0.95;
    }

    table#listas {
        width: 800px;
        top: 100px;
    }
</style>
