<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Support\str;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        $k = new Comment();
        $k -> user_comments = str::random(10);
       $k -> user_id = '1';
       $k -> save();


    }
}
