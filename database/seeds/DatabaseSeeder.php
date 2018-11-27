<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(CompaniesSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ShiftSeeder::class);
        $this->call(ShiftPastSeeder::class);
        $this->call(UserStampTableSeeder::class);

        Model::reguard();
    }
}
