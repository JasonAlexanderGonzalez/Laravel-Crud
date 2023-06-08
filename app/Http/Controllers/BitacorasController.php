<?php

namespace App\Http\Controllers;

use App\Models\Estados;
use App\Models\Tenants;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BitacorasController extends Controller
{
    //metodo que lista la pagina view de categorias cargada de datos
    public function Bitacoras(){
        //$user = Auth::user();
        //obtener el tenant relacionado con el usuario.
       // $tenant = $user->tenant;

       $id = Auth::user()->tenant->id;
       $usuarios = User::where('tenant_id', $id)->get();
       //var_dump($usuarios); die();
        
       
        return view('modulos.bitacoras',compact('usuarios'));
    }
}
