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
        $param = [
            'name' => '戦慄 店長',
            'email' => 'senritsu@email.com',
            'password' => Hash::make('senritsu_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'ルーク 店長',
            'email' => 'ruke@email.com',
            'password' => Hash::make('ruke_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '志摩屋 店長',
            'email' => 'shimaya@email.com',
            'password' => Hash::make('shimaya_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '香 店長',
            'email' => 'kaori@email.com',
            'password' => Hash::make('kaori_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'JJ 店長',
            'email' => 'jj@email.com',
            'password' => Hash::make('jj_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'らーめん極み 店長',
            'email' => 'ramenkiwami@email.com',
            'password' => Hash::make('ramenkiwami_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '鳥雨 店長',
            'email' => 'toriu@email.com',
            'password' => Hash::make('toriu_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '築地色合 店長',
            'email' => 'tsukidiiroai@email.com',
            'password' => Hash::make('tsukidiiroai_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '晴海 店長',
            'email' => 'harumi@email.com',
            'password' => Hash::make('harumi_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '三子 店長',
            'email' => 'sanshi@email.com',
            'password' => Hash::make('sanshi_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '八戒 店長',
            'email' => 'hakkai@email.com',
            'password' => Hash::make('hakkai_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '福助 店長',
            'email' => 'hukusuke@email.com',
            'password' => Hash::make('hukusuke_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'ラー北 店長',
            'email' => 'rakita@email.com',
            'password' => Hash::make('rakita_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '翔 店長',
            'email' => 'sho@email.com',
            'password' => Hash::make('sho_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '経緯 店長',
            'email' => 'keii@email.com',
            'password' => Hash::make('keii_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '漆 店長',
            'email' => 'urushi@email.com',
            'password' => Hash::make('urushi_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => 'THE TOOL 店長',
            'email' => 'thetool@email.com',
            'password' => Hash::make('thetool_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
        $param = [
            'name' => '木船 店長',
            'email' => 'kibune@email.com',
            'password' => Hash::make('kibune_pass'),
            'role' => '2',
        ];
        DB::table('users')->insert($param);
    }
}
