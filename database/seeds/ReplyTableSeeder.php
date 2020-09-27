<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('replies')->insert([
            'reply_content'=>'サンプル１',
            'comment_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>CArbon::now(),
        ]);
        DB::table('replies')->insert([
            'reply_content'=>'サンプル2',
            'comment_id'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>CArbon::now(),
        ]);
    }
}
