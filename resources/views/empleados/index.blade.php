@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif


<a href="{{ url('empleados/create' )}}">Crear empleado</a>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <!-- th*6 -->
            <th>#</th>
            <th>ID</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Edad</th>
            <th>Correo</th>
            <th>Aaciones</th>
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
                <img src="{{asset('storage').'/'.$empleado->foto}}" alt="" width="200" height="200">
                <!--#(Importante) Después es importante Linkear la carpeta storage en Laravel, mediante el comando: 
                cmd: php artisan storage:link y recargamos la pagina-->
            </td>
            <td>{{$empleado->nombre}}</td>
            <td>{{$empleado->apellido_paterno}}</td>
            <td>{{$empleado->apellido_materno}}</td>
            <td>{{$empleado->edad}}</td>
            <td>{{$empleado->correo}}</td>
            <td>
                <a href="{{ url('/empleados/'.$empleado->id.'/edit') }}">
                    Editar
                </a>
                |
                <form action="{{ url('/empleados/'.$empleado->id)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <!--Solicitamos acceso al metodo destroy obteneiendo el #-->
                    <button type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                </form>
            </td>


        </tr>
        @endforeach
    </tbody>
</table>