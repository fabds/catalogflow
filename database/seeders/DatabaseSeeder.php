<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([PermissionTableSeeder::class]);
        $this->call([UsersTableSeeder::class]);
        $this->call([RoleTableSeeder::class]);
        $this->call([JobsTableSeeder::class]);
        $this->call([ConfigTableSeeder::class]);
    }
}
