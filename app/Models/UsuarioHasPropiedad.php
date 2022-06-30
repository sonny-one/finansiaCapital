<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsuarioHasPropiedad extends Model
{
    use HasFactory;

    public function getSolicitudes()
    {
        $items = DB::table('views_solicitudes_visita')
            ->select('*')
            ->orderBy('idEjecutivo', 'asc')
            ->get();
        return $items;
    }
    public function getSolicitudesEjecutivo($idEjecutivo)
    {
        $items = DB::table('views_solicitudes_visita')
            ->select('*')
            ->where('idEjecutivo', $idEjecutivo)
            ->orderBy('idEjecutivo', 'asc')
            ->get();
        return $items;
    }
    public function existeReguistro($data)
    {
        $email = DB::table('usuario_has_propiedads')->where($data)->value('id');
        return  $email;
    }
}
