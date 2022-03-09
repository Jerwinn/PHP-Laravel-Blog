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
     */
    public function run()
    {
        $k = new UserComment();
        $k -> comment = 'test';
        $k -> save();
        $k ->userPost()
            ->attach(1);
        $k -> userPost()->attach(1);

    }
}
