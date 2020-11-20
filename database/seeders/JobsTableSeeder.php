<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            'filename' => 'Lamartina_netsuite_09324_masterfile.csv',
            'project' => 'lamartina',
            'type' => 'netsuite',
            'environment' => 'local',
            'key' => '20201120162629726',
            'status' => 'processed',
            'created_at' => now()
        ]);
    }
}
