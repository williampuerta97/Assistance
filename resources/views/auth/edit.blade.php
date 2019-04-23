            
            <div class="card-header">Actualizar administrador</div>
                <div class="card-body">
                        <input type="hidden" name="tokenAdmin" id="tokenAdmin" value="{{ csrf_token() }}"/>

                        <input type="hidden" id="id" value="{{ $admin->id }}" />
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-12 control-label">Correo electrónico</label>

                            <div class="col-md-12">
                                <input id="upd-email" type="email" class="form-control" name="email" value="{{ $admin->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label">Nueva contraseña</label>

                            <div class="col-md-12">
                                <input id="upd-password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button id="btn-upd-adm" class="btn btn-primary">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                </div>