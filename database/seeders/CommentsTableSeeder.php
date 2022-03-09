<?php

namespace Database\Seeders;

use App\Models\UserComment;
use Illuminate\Database\Seeder;

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
        $k -> comment = 'test';
        $k -> save();
        $k ->userPost()
            ->attach(random_int(1, 50));
        $k -> userPost()->attach(1);

    }
}
