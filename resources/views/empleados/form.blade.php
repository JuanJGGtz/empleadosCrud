    <div class="form-group">
        <!--Aplicando estilos al formulario-->
        <label for="nombre" class="control-label">{{'Nombre'}}</label>
        <!--Preguntamos si empleado contiene un valor de lo contrario <:> imprime vacio <''> -->
        <!--#{{$errors->has('nombre')?'is-invalid':''}} preguntamos si la variable nombre tiene un error de ser así aplica la class <is-invalid> que subraya en rojo el campo, de otra manera regresa el viejo valor del cammpo-->
        <input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" name="nombre" id="Nombre" value="{{isset($empleado->nombre)?$empleado->nombre:old('nombre')}}">
        
        <!--Mostramos el mensaje de error debajo del campo-->
        {!! $errors->first('nombre','<div class="invalid-feedback">:message</div>') !!}


    </div>

    <div class="form-group">
        <!--Aplicando estilos al formulario-->
        <label for="ApellidoPaterno">{{'Apellido Paterno'}}</label>
        <input type="text" class="form-control {{$errors->has('apellido_paterno')?'is-invalid':''}}" name="apellido_paterno" id="apellido_paterno" value="{{isset($empleado->apellido_paterno)?$empleado->apellido_paterno:old('apellido_paterno')}}">

        {!! $errors->first('apellido_paterno','<div class="invalid-feedback">:message</div>') !!}
    </div>


    <div class="form-group">
        <!--Aplicando estilos al formulario-->
        <label for="ApellidoMaterno">{{'Apellido Materno'}}</label>
        <input type="text" class="form-control {{$errors->has('apellido_materno')?'is-invalid':''}} " name="apellido_materno" id="apellido_materno" value="{{isset($empleado->apellido_materno)?$empleado->apellido_materno:old('apellido_materno')}}">

        {!! $errors->first('apellido_materno','<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <!--Aplicando estilos al formulario-->
        <label for="Edad">{{'Edad'}}</label>
        <input type="text" class="form-control {{$errors->has('edad')?'is-invalid':''}} " name="edad" id="edad" value="{{isset($empleado->edad)?$empleado->edad:old('edad')}}">
        {!! $errors->first('edad','<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        <label for="Correo">{{'Correo'}}</label>
        <input type="email" class="form-control {{$errors->has('correo')?'is-invalid':''}}" name="correo" id="correo" value="{{isset($empleado->correo)?$empleado->correo:old('correo')}}">
        {!! $errors->first('correo','<div class="invalid-feedback">:message</div>') !!}
    </div>


    <div class="form-group">
        <!--Aplicando estilos al formulario-->
        <label for="Foto">{{'Foto'}}</label>
        <br>
        @if(isset($empleado->foto))
        <img src="{{asset('storage').'/'.$empleado->foto}}" class="img-thumbnail" alt="" width="200" height="200">
        @endif

        <input class="form-control {{$errors->has('foto')?'is-invalid':''}}" type="file" name="foto" id="foto">
        
        {!! $errors->first('foto','<div class="invalid-feedback">:message</div>') !!}
    </div>
    <br>
    <input type="submit" class="btn btn-success" value="{{ $Modo == 'crear' ? 'Agregar':'Modificar'}}">
        <a class="btn btn-primary" href="{{url('empleados')}}">Regresar</a>