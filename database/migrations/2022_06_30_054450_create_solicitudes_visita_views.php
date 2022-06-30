<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSolicitudesVisitaViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE VIEW views_solicitudes_visita AS
        (
            SELECT
            up.id as idSolicitud,
            u.name as nombreInteresado,
            u.id as idInteresado,
            u.email as emailInteresado,
            p.id as idPropiedad,
            p.nombre as propiedad,
            p.valor as valorPropiedad,
            p.tipo as tipoNegocio,
            p.url as imgPropiedad,
            e.id as idEjecutivo,
            e.name as nombreEjecutivo,
            e.email as emailEjecutivo
            from usuario_has_propiedads up
            join users u on u.id = up.id_usuario
            join propiedades p on p.id = up.id_propiedad
            left join users e on e.id = up.id_ejecutivo
        )
      ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes_visita_views');
    }
}
