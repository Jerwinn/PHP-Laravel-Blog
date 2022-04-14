<?php

namespace Database\Seeders;

use App\Models\admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(UserPostTableSeeder::class);
        $this->call(CommentsTableSeeder::class);

        $k = new admin();
        $k -> id = 1;
        $k -> username = 'admin';
        $k -> password = 'password';
        $k -> save();
    }
}
