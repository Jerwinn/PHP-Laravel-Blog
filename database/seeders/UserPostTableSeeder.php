<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserPost;
use Illuminate\Database\Seeder;

class UserPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new UserPost();
        $a->title = 'title';
        $a->content = 'content';
        $a->user_id = 1;
        $a->save();
        UserPost::factory()->count(50)->create();


    }
}
