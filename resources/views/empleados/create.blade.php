@extends('layouts.app')

@section('content')

<div class="container">
<!--Validación  23 -->    
@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
        Porfavor, rellene correctamente los campos requeridos.
    <!--<ul>
        Porfavor, rellene correctamente los campos requeridos.
        
        #Mostramos una lista con lor errores    
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>-->
</div>
@endif
<!--Validación-->    

<!--#(Etiqueta) enctype="multipart/form-data" Funcion para el envio de fotografía-->
<!--#(Importante) Enviamos toda la información a empleados utilizando el metodo POST-->
<form action="{{ url('/empleados')}}" class="forn-horizontal" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <!--Llave de acceso-->
    @include('empleados.form',['Modo'=>'crear'])

</form>

</div>
@endsection