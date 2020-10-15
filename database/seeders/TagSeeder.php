<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags=[
        	['name'=>'必做'],
        	['name'=>'选做'],
        	['name'=>'家庭'],
        	['name'=>'工作']
        ];
        foreach($tags as $tagEntity){
        	$tag = new Tag($tagEntity);
        	$tag->fill($tagEntity)->save();
        }
    }
}
