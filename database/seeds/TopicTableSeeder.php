<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TopicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles=['野球について','合コン負けたど','海外行ってみた'];

        foreach($titles as $title){
            DB::table('topics')->insert([
                'title'=>$title,
                'content'=>'サンプル',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }
    }
}
