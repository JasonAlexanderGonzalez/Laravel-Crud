<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenants;
use Illuminate\Support\Facades\Auth;

class TenantsController extends Controller
{
    //cargar la pagina del perfil de la tienda del tenant
    public function edit(){
        //obtones el usuario autenticado
        $user = Auth::user();

        //obtones el tenant relacionado con el usuario
        $tenant = $user->tenant;

        return view('modulos.perfil_tienda', compact('tenant'));
    }

    public function editarTenant(Request $request)
    {
        $id = Auth::user()->tenant->id;
        $data = Tenants::find($id);
        $data->Direccion = $request->Direccion;
        $data->nombreTienda = $request->nombreTienda;
    
        $data->save();
    
        $notification = array(
            'message' => 'Los datos del perfil de usuario se actualizaron satisfactoriamente',
            'alert-type' => 'info'
        );
        return redirect()->route('tenant.edit')->with($notification);
    }

}
