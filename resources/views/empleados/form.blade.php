    {{ $Modo == 'crear' ? 'Agregar empleado':'Modificar empleado'}}
    <label for="nombre">{{'Nombre'}}</label>
    <input type="text" name="nombre" id="Nombre" >
    
    <br>
    <label for="ApellidoPaterno">{{'Apellido Paterno'}}</label>
    <input type="text" name="apellido_paterno" id="apellido_paterno">
    <br>
    <label for="ApellidoMaterno">{{'Apellido Materno'}}</label>
    <input type="text" name="apellido_materno" id="apellido_materno">
    <br>
    <label for="Edad">{{'Edad'}}</label>
    <input type="text" name="edad" id="edad">
    <br>
    <label for="Correo">{{'Correo'}}</label>
    <input type="email" name="correo" id="correo">
    <br>
    <label for="Foto">{{'Foto'}}</label>
    <input type="file" name="foto" id="foto">
    <br>


    <input type="submit" value="Aceptar">
    <a href="{{url('empleados')}}">Regresar</a>