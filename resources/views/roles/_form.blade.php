
<div class="card-body">
    <div class="form-group">
        <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
        {!! $errors->first('name', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
        </div>

         <h5><b>Permissões</b></h5>

        <div class='form-group'>
        @foreach ($permissions as $permission)
            {!! Form::checkbox('permissions[]',  $permission->id ) !!}
            {!! Form::label($permission->name, ucfirst($permission->name)) !!}<br>

        @endforeach
        </div>

    </div>
</div>
