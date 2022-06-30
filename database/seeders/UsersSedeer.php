<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =
            [
                [
                    'name' => 'Admin',
                    'email' => 'admin@fc.cl',
                    'id_rol' => '1',
                    'password' => '$2y$10$BbvCzev3HdH5SdjNklC4XewKLrcx/t9fuHwdaInJouhA7N75F7Ne6'
                ],
                [
                    'name' => 'Venderor',
                    'email' => 'venderor@fc.cl',
                    'id_rol' => '2',
                    'password' => '$2y$10$BbvCzev3HdH5SdjNklC4XewKLrcx/t9fuHwdaInJouhA7N75F7Ne6'
                ],
                [
                    'name' => 'Cliente',
                    'email' => 'cliente@fc.cl',
                    'id_rol' => '3',
                    'password' => '$2y$10$BbvCzev3HdH5SdjNklC4XewKLrcx/t9fuHwdaInJouhA7N75F7Ne6'
                ]
            ];

            DB::table('users')->insert($data);
    }
}
