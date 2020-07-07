<?php

namespace App\Http\Controllers;

use App\Empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //Para poder borrar registros en la carpeta uploads
//suse DB;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //(Impirtante) pasamos a la variable ($datos) la informacion de la tabla "empleados" en la BD Empleados y los paginamos en 6
        $datos['empleados'] = Empleados::paginate(8);
        return view("empleados.index", $datos);
        //(Importante) accedemos desde la vista .index a los datos de la tabla "empelados" gracias a la variable $datos
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("empleados.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Aplicacion de las validaciones
        $campos=[
            'nombre'=>'required|string|max:100',
            'apellido_paterno'=>'required|string|max:100',
            'apellido_materno'=>'required|string|max:100',
            'edad'=>'required|numeric|max:80|min:20',
            'correo'=>'required|email',
            'foto'=>'required|max:10000|mimes:jpeg,jpg,png'
        ];

        $Mensaje=["required"=>'Campo :attribute es requerido'];
        $this->validate($request,$campos,$Mensaje);

        //(Importante)Creamos una variable ($datosEmpleado) que va almacenar toda la informacion que se reciba del metodo Store)
        $datosEmpleado = request()->all();
        $datosEmpleado = request()->except("_token");
        //recolectamos la informacion de la fotografia

        if ($request->hasFile("foto")) {
            //Modificamos foto, lo almacenamos en la carpeta "uploads" que esta en la carpeta "public"
            $datosEmpleado["foto"] = $request->file("foto")->store("uploads", "public");
            //la carpeta donde se almacena la fotografia es "estudiantes\storage\app\public\uploads"
        }
        //(Importante)Durante la creación de la bd se tiene muchos problemas cuidado , no usar ejemplo: "_nombre" como base de datos, se generan muchos problemas.
        //la primera letra en mayuscula  
        Empleados::insert($datosEmpleado);
        //(Impresión)
        //return response()->json($datosEmpleado);
        return redirect("empleados")->with('Mensaje', 'Empleado creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Se busca todos los empleados con ese id 
        // me devuelve toda la información con respecto a ese id
        $empleado = Empleados::findOrFail($id);

        return view("empleados.edit",compact("empleado"));
        //enviamos la información del empleado atraves de la vista
        //return redirect("empleados")->with('Mensaje', 'Empleado actualizado con éxito');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosEmpleado = request()->except(['_token', '_method']);

        //(Importante) Se trae el if para poder visualizar la nueva foto en editar 
        if ($request->hasFile("foto")) {

            $empleado =  Empleados::findOrFail($id); //COnsultamos antes para obtener la información antigua

            //Accedemos a Storage para borrar la fotografia 
            //(Importante) Es necesario para borrar la fotografia y colocar la nueva, de otra forma mantedremos la pasada fotografia en ls BD pero no pertenecerá a ningun registro, ocupando espacio inecesario
            Storage::delete('public/' . $empleado->foto);


            //Modificamos foto, lo almacenamos en la carpeta "uploads" que esta en la carpeta "public"
            $datosEmpleado["foto"] = $request->file("foto")->store("uploads", "public");
            //la carpeta donde se almacena la fotografia es "estudiantes\storage\app\public\uploads"
        }

        Empleados::where('id', '=', $id)->update($datosEmpleado); //Actualizamod la BD

        $empleado =  Empleados::findOrFail($id); //COnsultamos para obtener la información actual
        //return view("empleados.edit",compact("empleado"));
        return redirect("empleados")->with('Mensaje', 'Empleado actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado =  Empleados::findOrFail($id); //COnsultamos antes para obtener la información antigua

        //Accedemos a Storage para borrar la fotografia 
        //(Importante) Es necesario para borrar la fotografia y colocar la nueva, de otra forma mantedremos la pasada fotografia en ls BD pero no pertenecerá a ningun registro, ocupando espacio inecesario
        if (Storage::delete('public/' . $empleado->foto)) {
            Empleados::destroy($id);
        }
        //return redirect("empleados");  
        return redirect("empleados")->with('Mensaje', 'Empleado eliminado con éxito');
    }
}
