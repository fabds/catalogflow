<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config')->insert([
            'name' => 'context',
            'scope' => 'devonanddevon',
            'value' => 'context.csv',
            'active' => '1'
        ]);
        DB::table('config')->insert([
            'name' => 'context',
            'scope' => 'barrett',
            'value' => 'context.csv',
            'active' => '1'
        ]);
        DB::table('config')->insert([
            'name' => 'context',
            'scope' => 'palzileri',
            'value' => 'context.csv',
            'active' => '1'
        ]);
        DB::table('config')->insert([
            'name' => 'context',
            'scope' => 'boxeurdesrues',
            'value' => 'context.csv',
            'active' => '1'
        ]);
        DB::table('config')->insert([
            'name' => 'context',
            'scope' => 'lamborghinib2c',
            'value' => 'context.csv',
            'active' => '1'
        ]);
        DB::table('config')->insert([
            'name' => 'context',
            'scope' => 'brics',
            'value' => 'context.csv',
            'active' => '1'
        ]);
        DB::table('config')->insert([
            'name' => 'context',
            'scope' => 'obag',
            'value' => 'context.csv',
            'active' => '1'
        ]);
        DB::table('config')->insert([
            'name' => 'context',
            'scope' => 'maliparmi',
            'value' => 'context.csv',
            'active' => '1'
        ]);
        DB::table('config')->insert([
            'name' => 'context',
            'scope' => 'guzzini',
            'value' => 'context.csv',
            'active' => '1'
        ]);
        DB::table('config')->insert([
            'name' => 'context',
            'scope' => 'faber',
            'value' => 'context.csv',
            'active' => '1'
        ]);
        DB::table('config')->insert([
            'name' => 'context',
            'scope' => 'lamartina',
            'value' => 'context.csv',
            'active' => '1'
        ]);
    }
}
