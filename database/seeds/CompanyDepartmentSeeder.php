<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CompanyDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		for ($i=1; $i <= 3; $i++) { 
			DB::table('company_departments')->insert([
			'company_id' => rand(1,3),
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
            'name'       => 'Elever'
		]);
		}
    }
}
