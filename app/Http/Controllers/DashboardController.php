<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use App\Models\Clientes;
use App\Models\DetalleVentas;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function InfoDashboard()
    {
        $user = Auth::user();
        // Obtener el inquilino relacionado con el usuario.  
        $tenant = $user->tenant;
        // Obtener el número de ventas del tenant
        $numeroVentas = Ventas::where('tenant_id', $tenant->id)->count();
        $usuarios = User::where('tenant_id', $tenant->id);
        $numeroClientes = Clientes::where('tenant_id', $tenant->id)->count();
        $totalVentas = Ventas::where('tenant_id', $tenant->id)->sum('TotalVentas');
        $totalUsuarios = User::where('tenant_id', $tenant->id)->count();

        // Pasar el número de ventas a la vista junto con otras variables
        return view('admin.index', compact('numeroVentas', 'numeroClientes', 'totalVentas', 'totalUsuarios','tenant'));
    }

}

