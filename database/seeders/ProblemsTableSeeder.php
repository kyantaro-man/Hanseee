<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProblemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['タイトル1', 'タイトル2', 'タイトル3'];

        foreach($titles as $title) {
            DB::table('problems')->insert([
                'title' => $title,
                'category_id' => 1,
                'created_at' =>Carbon::now(),
                'updated_at' =>Carbon::now(),
            ]);
        }
    }
}
