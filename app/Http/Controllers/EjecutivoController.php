<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioHasPropiedad;
use Illuminate\Support\Js;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class EjecutivoController extends Controller
{
    public function index()
    {
        $uhp = new UsuarioHasPropiedad();
        if (auth()->user()->id_rol==1) {
            $solicitudes = $uhp->getSolicitudes();
        } else {
            $solicitudes = $uhp->getSolicitudesEjecutivo(auth()->user()->id);
        }

        return view('ejecutivo.ejecutivo', compact('solicitudes'));
    }
}
