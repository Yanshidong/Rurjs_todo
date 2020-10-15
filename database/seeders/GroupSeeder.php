<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $groups = [
        	['name'=>'家庭组','description'=>'家庭内部公用组,可分组家庭内部成员和家庭Task'],
        	['name'=>'工作组','description'=>'工作组,组内成员,工作组Task']
        ];

        foreach ($groups as $key => $value) {
        	$group = new Group($value);
        	$group->save();
        }
    }
}
