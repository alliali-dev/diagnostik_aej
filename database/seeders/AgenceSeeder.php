<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $agence= [
            [
                'name' => 'ABOBO',
                'code' => '01',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'name' => 'ADJAME',
                'code' => '02',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'name' => 'TREICHVILLE',
                'code' => '03',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'YOPOUGON',
                'code' => '04',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'DIMBOKRO',
                'code' => '06',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'ABENGOUROU',
                'code' => '07',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'DALOA',
                'code' => '08',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'BOUAKE',
                'code' => '09',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'GAGNOA',
                'code' => '10',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'SANPEDRO',
                'code' => '11',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'YAMOUSSOUKRO',
                'code' => '12',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'GUIGLO',
                'code' => '13',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'KORHOGO',
                'code' => '16',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'DG-PLATEAU',
                'code' => '17',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'ABOISSO',
                'code' => '18',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'MAN',
                'code' => '19',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'BEOUMI',
                'code' => '20',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'DAOUKRO',
                'code' => '21',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'ODIENNE',
                'code' => '22',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'SOUBRE',
                'code' => '23',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'name' => 'PRESTIGE',
                'code' => '24',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('agences')->insert($agence);
    }
}
