<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['nombre'=>'Admin'],
            ['nombre'=>'Vendedor'],
            ['nombre'=>'Cliente']
                ];
    DB::table('roles')->insert($data);
    
    }
}
