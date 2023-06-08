<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorias; //Llamamos al Models llamado Categorías para que cargue elmétodo
use App\Models\Estados; //Llamamos al Models llamado Estados para cargarlos en lacategoría
use App\Models\Tenants; //llamamos al Models Tenants con quien tiene relación categorías
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    //metodo que lista la pagina view de categorias cargada de datos
    public function Categorias(){
        $user = Auth::user();
        //obtener el tenant relacionado con el usuario.
        $tenant = $user->tenant;
        $categDatos = $tenant->categorias;
        $estados = Estados::all();

        return view('modulos.categorias',compact('categDatos', 'estados','tenant'));
    }

    //Método para GUARDAR una Nueva Categoria en la base de datos
public function GuardarCategoria(Request $request){
    //Primero validamos los campos obligatorios
    $request->validate(
    ['nombrecategoria'=>'required',
    'tenants_id'=>'required',
    'estado_id'=>'required']
    );
    //FORMA 3
    Categorias::insert([
    'nombrecategoria' => $request->nombrecategoria,
    'estado_id' => $request->estado_id,
    'tenants_id' => $request->tenants_id,
    'created_at' => $request->created_at = now(),
    ]);
    $notification = array(
    'message' => 'La categoria se guardó con éxito',
    'alert-type' => 'success'
    );
    return redirect()->route('modulos.categorias')->with($notification);
    }// End Method

    //Método que nos hace obtener el id de la categoria que deseamos actualizar o modificar
public function EditarCategoria($id){
$categDatos = Categorias::findOrFail($id);
return response()->json($categDatos);
}// End Method

public function ModificarCategoria(Request $request){
    $id = $request->id;

    $data = Categorias::find($id);
    $data->NombreCategoria = $request->NombreCategoria;
    $data->tenants_id = $request->tenants_id;
    $data->estado_id = $request->estado_id;
    $data->updated_at = $request->updated_at = now();
    $data->save();
    $notification = array(
        'message' => 'La categoria se actualizo correctamente',
        'alert-type' => 'success'
    );
    return redirect()->route('modulos.categorias')->with($notification);
}

public function EliminarCategoria($id){
    Categorias::findOrFail($id)->delete();
    $notification = array(
        'message' => 'La categoria se elimino correctamente',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
}


    
}
