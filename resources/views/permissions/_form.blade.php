<div class="box-header with-border">
        <h3 class="box-title">Permissões</h3>
</div>
<div class="card-body">
        <div class="row">
             <div class="col-md-4 col-lg-4">
                <div class="form-group">
                    {{ Form::label('name', 'Permission Name') }}
                    {{ Form::text('name', null, ['class' => 'form-control form-control-sm', 'required']) }}
                </div>
             </div>
        </div>
</div>