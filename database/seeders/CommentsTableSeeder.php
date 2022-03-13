<?php

namespace Database\Seeders;

use App\Models\UserComment;
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
        $k = new UserComment();
        $k -> comment = str::random(10);
        $k -> user_id = '1';
        $k -> save();
        $k ->postComments()->attach(random_int(1, 50));
        $k -> postComments()->attach(random_int(1, 50));
    }
}
