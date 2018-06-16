

<div class="card-body">
    <div class="form-group">
            {{ Form::label('name', 'Name', ['class' => 'col-sm-12 control-label']) }}
            {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
        {!! $errors->first('name', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}

            {{ Form::label('email', 'Email',  ['class' => 'col-sm-12 control-label'])}}
            {{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
        {!! $errors->first('email', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}

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