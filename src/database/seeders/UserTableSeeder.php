<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ルート管理者の作成
        $param = [
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin_pass'),
            'role' => '1',
        ];
        DB::table('users')->insert($param);

        // 店舗代表者の作成
        $param = [
            'name' => '仙人 店長',
            'email' => 'sennin@email.com',
            'password' => Hash::make('sennin_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '牛助 店長',
            'email' => 'gyusuke@email.com',
            'password' => Hash::make('gyusuke_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        

    }
}
