<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UsuarioHasPropiedad;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use View;

class AdminController extends Controller
{
    public function index()
    {

        /** id_rol 2 => usuarios con rol de ejecutivo  */
        $ejecutivos =  User::all()->where('id_rol', 2);

        $uhp = new UsuarioHasPropiedad();
        $solicitudes = $uhp->getSolicitudes();

        return view('admin.admin', compact('solicitudes', 'ejecutivos'));
    }

    public function guardar()
    {
        $respuesta = [];
        $data = (object)request()->all();
        $up = new UsuarioHasPropiedad();

        $validar = [['id_usuario', $data->id_user], ['id_propiedad', $data->id_propiedad]];

        $existe = $up->existeReguistro($validar);
        if (!$existe) {
            $up->id_usuario = $data->id_user;
            $up->id_propiedad = $data->id_propiedad;
            $up->save();

            $up->nuevo = true;

            return response()->json($up);
        }
        return response()->json(['nuevo' => false]);
    }

    public function asignaVendedor()
    {
        $respuesta = [];
        $data = (object)request()->all();

        $up =  UsuarioHasPropiedad::find($data->idSolicitud);

        $up->id_ejecutivo = $data->idEjecutivo;
        $up->save();

        return response()->json($up);
    }
}
