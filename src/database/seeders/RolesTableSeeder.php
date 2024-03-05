<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[
            'name'=>'admin',
        ];
        DB::table('roles')->insert($param);

        $param=[
            'name'=>'manager',
        ];
        DB::table('roles')->insert($param);

        $param=[
            'name'=>'user',
        ];
        DB::table('roles')->insert($param);
    }
}
