<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $texts = ['対策１です', '対策２です', '対策３です'];

        for($i=0; $i<3; $i++) {
            DB::table('steps')->insert([
                'text' => $texts[$i],
                'problem_id' => $i+1,
                'created_at' =>Carbon::now(),
                'updated_at' =>Carbon::now(),
            ]);
        }
    }
}
