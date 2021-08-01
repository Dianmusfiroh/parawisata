<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$Yrs5C2j.xZu/wQKUIsTXhOYVkCoePt2yZiF5asC54Zl/bh/BQLXWu'
        ]);
    }
}
