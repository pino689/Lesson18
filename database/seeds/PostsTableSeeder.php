<?php

// namespace Database\Seeders;

use Illuminate\Database\Seeder;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->insert([

            ['user_name' => 'ニックネーム'],
            ['contents' => 'さて、ここで問題発生〜'],

        ]);
    }
}
