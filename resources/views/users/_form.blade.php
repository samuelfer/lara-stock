<div class="box-header with-border">
    <h3 class="box-title">Usuário</h3>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {!! Form::text('name', null, ['class' => 'form-control form-control-sm', 'required']) !!}
            {!! $errors->first('name', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
            {{ Form::label('email', 'Email')}}
            {{ Form::email('email', null, ['class' => 'form-control form-control-sm', 'required']) }}
            {!! $errors->first('email', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
        </div>
    </div>
        <div class='form-group'>
            @foreach ($roles as $role)
                {{ Form::checkbox('roles[]',  $role->id ) }}
                {{ Form::label($role->name, ucfirst($role->name)) }}

            @endforeach
        </div>


            {{ Form::label('password', 'Senha', ['class' => 'col-sm-12 control-label']) }}
            {{ Form::password('password', null, ['class' => 'form-control', 'required']) }}




            {{ Form::label('password', 'Confirme a senha', ['class' => 'col-sm-12 control-label']) }}
            {{ Form::password('password_confirmation', null, ['class' => 'form-control', 'required']) }}

    </div>
</div>