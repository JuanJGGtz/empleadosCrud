edicion de empleados
<form action="{{ url('/empleados/'.$empleado->id)}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PATCH')}}

    @include('empleados.form',['Modo'=>'modificar'])


    <input type="text" name="nombre" id="Nombre" value="{{$empleado -> nombre}}">
    <br>

    <label for="ApellidoPaterno">{{'Apellido Paterno'}}</label>
    <input type="text" name="apellido_paterno" id="apellido_paterno" value="{{$empleado -> apellido_paterno}}">
    <br>

    <label for="ApellidoMaterno">{{'Apellido Materno'}}</label>
    <input type="text" name="apellido_materno" id="apellido_materno" value="{{$empleado -> apellido_materno}}">
    <br>

    <label for="Edad">{{'Edad'}}</label>
    <input type="text" name="edad" id="edad" value="{{$empleado -> edad}}">
    <br>

    <label for="Correo">{{'Correo'}}</label>
    <input type="email" name="correo" id="correo" value="{{$empleado -> correo}}">
    <br>

    <label for="Foto">{{'Foto'}}</label>
    <br>
    <img src="{{asset('storage').'/'.$empleado->foto}}" alt="" width="200" height="200">
    <br>
    <input type="file" name="foto" id="foto" value="">
    <br>
    <input type="submit" value="Modificar">
    <a href="{{url('empleados')}}">Cancelar</a>
</form>