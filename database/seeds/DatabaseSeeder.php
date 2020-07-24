<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(AdminAccountDatabaseSeeder::class);
    }
}
class AdminAccountDatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        DB::table('user_roles')->insert([
            'user_id' => 1,
            'role_id' => 1
        ]);
    }
}
