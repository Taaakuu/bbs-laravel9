<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // 生成数据集合
        User::factory()->count(13)->create();

        // 处理第一个用户的数据
        $user = User::find(2);
        $user->name = 'TAKU';
        $user->email = 'fujiwarachris324@gmail.com';
        $user->password = bcrypt('12345678');
        $user->avatar = 'https://cdn.learnku.com/uploads/images/201710/14/1/ZqM7iaP4CR.png';
        $user->save();


        // 初始化用户角色，将 ID 为 1 的用户指派为「站长」
        $user->assignRole('Founder');

        // 将 ID 为 2 的用户指派为「管理员」
        $user = User::find(2);
        $user->assignRole('Maintainer');
    }
}
