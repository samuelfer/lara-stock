
<div class="box-header with-border">
    <h3 class="box-title">Posts</h3>
</div>

<div class="card-body">
    <div class="row">
        <div class="col-md-4 col-lg-4">
            <div class="form-group">
                {!! Form::label('title', 'Título') !!}
                {!! Form::text('title', null, ['class' => 'form-control form-control-sm']) !!}
                {!! $errors->first('title', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
            </div>
        </div>

        <div class="col-md-12 col-lg-12">
            <div class="form-group">
                {!! Form::label('body', 'Observação') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control form-control-sm']) !!}
                {!! $errors->first('body', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
            </div>
        </div>
    </div>
</div>

