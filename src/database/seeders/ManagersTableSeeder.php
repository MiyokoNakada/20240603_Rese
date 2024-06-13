<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Shop;
use App\Models\Manager;
use Illuminate\Support\Facades\DB;

class ManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function(){
                $managers = User::where('role', '2')->get();
                $shops = Shop::all();

                foreach ($shops as $index => $shop) {
                    if (isset($managers[$index])) {
                        $manager = $managers[$index];

                        // Managerテーブルに登録
                        Manager::create([
                            'user_id' => $manager->id,
                            'shop_id' => $shop->id,
                        ]);
                    }            
                }
        });
    }
}