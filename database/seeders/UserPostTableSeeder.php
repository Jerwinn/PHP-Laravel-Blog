<?php

namespace Database\Seeders;

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
        UserPost::factory()->count(50)->create();
    }
}
