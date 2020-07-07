    <div class="form-group">
        <!--Aplicando estilos al formulario-->
        <label for="nombre" class="control-label">{{'Nombre'}}</label>
        <!--Preguntamos si empleado contiene un valor de lo contrario <:> imprime vacio <''> -->
        <input type="text" class="form-control" name="nombre" id="Nombre" value="{{isset($empleado->nombre)?$empleado->nombre:''}}">
    </div>

    <div class="form-group">
        <!--Aplicando estilos al formulario-->
        <label for="ApellidoPaterno">{{'Apellido Paterno'}}</label>
        <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" value="{{isset($empleado->apellido_paterno)?$empleado->apellido_paterno:''}}">
    </div>
    <div class="form-group">
        <!--Aplicando estilos al formulario-->
        <label for="ApellidoMaterno">{{'Apellido Materno'}}</label>
        <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" value="{{isset($empleado->apellido_materno)?$empleado->apellido_materno:''}}">
    </div>
    <div class="form-group">
        <!--Aplicando estilos al formulario-->
        <label for="Edad">{{'Edad'}}</label>
        <input type="text" class="form-control" name="edad" id="edad" value="{{isset($empleado->edad)?$empleado->edad:''}}">
    </div>
    <div class="form-group">
        <label for="Correo">{{'Correo'}}</label>
        <input type="email" class="form-control" name="correo" id="correo" value="{{isset($empleado->correo)?$empleado->correo:''}}">
    </div>
    <div class="form-group">
        <!--Aplicando estilos al formulario-->
        <label for="Foto">{{'Foto'}}</label>
        <br>
        @if(isset($empleado->foto))
        <img src="{{asset('storage').'/'.$empleado->foto}}" class="img-thumbnail" alt="" width="200" height="200">
        @endif
    </div>

    
        <input class="form-control" type="file" name="foto" id="foto">
        <br>

        <input type="submit" class="btn btn-success" value="{{ $Modo == 'crear' ? 'Agregar':'Modificar'}}">
        <a class="btn btn-primary" href="{{url('empleados')}}">Regresar</a>