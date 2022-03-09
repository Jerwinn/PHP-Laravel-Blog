<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserPost;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::factory()->count(50)->create();
    }
}
