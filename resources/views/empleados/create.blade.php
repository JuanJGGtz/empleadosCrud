creacion de empleados""


<!--#(Etiqueta) enctype="multipart/form-data" Funcion para el envio de fotografía-->
<!--#(Importante) Enviamos toda la información a empleados utilizando el metodo POST-->
<form action="{{ url('/empleados')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <!--Llave de acceso-->
    @include('empleados.form',['Modo'=>'crear'])

</form>