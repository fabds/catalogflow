<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            'filename' => 'DevonAndDevon_masterfile_20201232.csv',
            'project' => 'devonanddevon',
            'type' => 'masterfile',
            'environment' => 'local',
            'key' => '321654987456',
            'status' => 'received',
            'created_at' => now()
        ]);
        DB::table('jobs')->insert([
            'filename' => 'Barrett_masterfile_20201232.csv',
            'project' => 'barrett',
            'type' => 'masterfile',
            'environment' => 'staging',
            'key' => '321654987SDF',
            'status' => 'processed',
            'created_at' => now()
        ]);
        DB::table('jobs')->insert([
            'filename' => 'Obag_bundle_0_20201232.csv;Obag_bundle_1_20201232.csv',
            'project' => 'obag',
            'type' => 'bundle',
            'environment' => 'production',
            'key' => '0923987348978',
            'status' => 'uploaded',
            'created_at' => now()
        ]);
        DB::table('jobs')->insert([
            'filename' => 'DevonAndDevon_customoption_20201232.csv',
            'project' => 'devonanddevon',
            'type' => 'customoption',
            'environment' => 'local',
            'key' => '2340983249234',
            'status' => 'received',
            'created_at' => now()
        ]);
        DB::table('jobs')->insert([
            'filename' => 'Lamborghini_masterfile_20201232.csv',
            'project' => 'lamborghini',
            'type' => 'masterfile',
            'environment' => 'production',
            'key' => '32165498745SA6',
            'status' => 'received',
            'created_at' => now()
        ]);
        DB::table('jobs')->insert([
            'filename' => 'Dekker_masterfile_20201232.csv',
            'project' => 'dekker',
            'type' => 'masterfile',
            'environment' => 'staging',
            'key' => '3216549874POS56',
            'status' => 'received',
            'created_at' => now()
        ]);
    }
}
