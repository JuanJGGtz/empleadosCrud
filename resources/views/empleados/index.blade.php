@extends('layouts.app')

@section('content')

<div class="container">
    <!--La informacion quedará adentro de la clase container-->

    @if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
    @endif
    <a href="{{ url('empleados/create' )}}" class="btn btn-success">Crear empleado</a>
    <br>
    <br>
    <table class="table table-light table-hover">
        <thead class="thead-light">
            <tr>
                <!-- th*6 -->
                <th>#</th>
                <th>ID</th>
                <th>Foto</th>
                <th>Nombre</th>
                <!--<th>Apellido Paterno</th>
            <th>Apellido Materno</th>-->
                <th>Edad</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!--#(Importante)"$empelados" es el Indice de la variable $datos en EmpleadoControler , "$empleado" sera nuetra nueva varible unica para recepcionar los datos-->
            @foreach($empleados as $empleado)
            <tr>
                <!--loop iteration mostrará el numero del registro-->
                <td>{{$loop->iteration}}</td>
                <!--Se agrega cada una de las columnas de nuestra tabla "empelados"-->
                <td>{{$empleado->id}}</td>
                <td>
                    <!--#(Importante) Le damos acceso a la ubicación de la fotografia con (asset('storage'(Carpeta Storage)))-->
                    <img src="{{asset('storage').'/'.$empleado->foto}}" class="img-thumbnail" alt="" width="100" height="100">
                    <!--#(Importante) Después es importante Linkear la carpeta storage en Laravel, mediante el comando: 
                cmd: php artisan storage:link y recargamos la pagina-->
                </td>
                <!--Uno el nombre y apellidos-->
                <td>{{$empleado->nombre}} {{$empleado->apellido_paterno}} {{$empleado->apellido_materno}}</td>
                <!--<td>{{$empleado->apellido_paterno}}</td>
                <td>{{$empleado->apellido_materno}}</td>-->
                <td>{{$empleado->edad}}</td>
                <td>{{$empleado->correo}}</td>
                <td>
                    <a href="{{ url('/empleados/'.$empleado->id.'/edit') }}" class="btn btn-warning">
                        Editar
                    </a>
                    
                    <form action="{{ url('/empleados/'.$empleado->id)}}" method="post" style="display:inline;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <!--Solicitamos acceso al metodo destroy obteneiendo el #-->
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection