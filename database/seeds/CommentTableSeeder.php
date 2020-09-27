<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments=['サンプル１','サンプル2','サンプル3'];

        foreach($comments as $comment){
            DB::table('comments')->insert([
                'comment'=>$comment,
                'topic_id'=>1,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ]);
        }


    }
}
