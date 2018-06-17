
       <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                    {!! $errors->first('name', '<span class="help-block" style="color:red"><strong>:message</strong></span>') !!}
                </div>

                <div class="col-md-12">
                    @if($permissions->count() > 0)
                        <label for="permissions">Permissões do Perfil</label>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr class="active">
                                    <th>Funcionalidade</th>

                                    @foreach($permissions as $permission)
                                        <th class="text-center" data-toggle="tooltip" title="{{$permission->description}}">{{$permission->name}}</th>
                                    @endforeach

                                </tr>
                                </thead>
                                <tbody>
                                {{--{{$contador = 1}}--}}

                                <tr>
                                    <th></th>
                                    @foreach($permissions as $permission)
                                        <td class="text-center">
                                            <div class="">

                                                {!! Form::checkbox('permissions[]',  $permission->id ) !!}
                                                {!! Form::label($permission->name, ' ', ['class'=>'check-box'], ucfirst($permission->name)) !!}
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    @else
                        <label for="permissions">Não Existe Permissões Cadastradas</label>
                    @endif
                </div>

            </div>
        </div>
