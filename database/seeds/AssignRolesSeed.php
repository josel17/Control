<?php

use App\Model_has_role;
use Illuminate\Database\Seeder;

class AssignRolesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Model_has_role::create(['role_id'=>1, 'model_type'=>'App\\User', 'model_id'=>1]);
    }
}




