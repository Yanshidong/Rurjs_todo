<?php

namespace Database\Seeders;

use App\Models\Administrator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * 数据库初始化数据在当前类处理，生产使用
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // 后台管理员用户初始化
        $users=[
            [
                'name'=>'ruru',
                'email'=>'rurujiade@outlook.com',
                'description'=>'is super',
                'password'=>'f938243de3a4cd1308a7e5885de4337a',
                'is_16'=>true
            ],
            [
                'name'=>'admin',
                'email'=>'wangde007@outlook.com',
                'description'=>'is super',
                'password'=>'f938243de3a4cd1308a7e5885de4337a',
                'is_16'=>false
            ]
        ];
        foreach ($users as $userFiller){
            $user = new Administrator($userFiller);
            $user->save();
        }

    }
}
