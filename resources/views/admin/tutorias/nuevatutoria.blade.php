  <!-- Modal -->
  <div class="modal fade" id="users" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Informacion de la tutoría</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/tutorias/creartutoria') }}" id="frmUsers">
                {{ csrf_field() }}


                <div class="form-group{{ $errors->has('id_usuario') ? ' has-error' : '' }}">
                    <label for="id_usuario" class="col-md-4 control-label">Id del Usuario</label>

                    <div class="col-md-6">
                        <input id="id_usuario" type="number" class="form-control" name="id_usuario" value="{{ old('id_usuario') }}" autofocus>

                        @if ($errors->has('id_usuario'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_usuario') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('nivel') ? ' has-error' : '' }}">
                  <label for="nivel" class="col-md-4 control-label">Nivel</label>
                    <div class="col-md-6">

                        <select class="form-control" name="nivel">
                          <option value="">Elija un nivel</option>
                          <!--Se deberia quitar el punto y coma cuando se adapten todas las bases
                        (las bases de datos actualizadas no tienen el ;)-->
                          <option value=";Universitario">Universitario</option>
                          <option value=";Secundaria">Secundaria</option>
                          <option value=";Primaria">Primaria</option>
                        </select>
                    </div>
                  </div>

                  <div class="form-group{{ $errors->has('materia') ? ' has-error' : '' }}">
                      <label for="materia" class="col-md-4 control-label">Materia</label>
                    <div class="col-md-6">
                        <select class="form-control" name="materia">
                          <option value="">Elija una materia</option>
                          <!--Hay que agregar una forma para que solo se elijan materias que existan en el
                        nivel elegido-->
                          @foreach($materias as $materia)
                            <option value={{$materia->nombre}}>{{$materia->nombre}}</option>
                          @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary" id='save'>Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
            </div>
            </div>
      </div>

  </div>
