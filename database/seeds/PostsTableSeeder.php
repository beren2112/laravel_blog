<?php

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
        DB::table('posts')->insert([

            [
                'user_id' => 1,
                'category_id' => 1,
                'photo_id' => 1,
                'title' => str_random(10),
                'body' => str_random(60),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'category_id' => 2,
                'photo_id' => 2,
                'title' => str_random(10),
                'body' => str_random(60),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'category_id' => 3,
                'photo_id' => 3,
                'title' => str_random(10),
                'body' => str_random(60),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'category_id' => 4,
                'photo_id' => 4,
                'title' => str_random(10),
                'body' => str_random(60),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'user_id' => 1,
                'category_id' => 1,
                'photo_id' => 5,
                'title' => str_random(10),
                'body' => str_random(60),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],

        ]);
    }
}
