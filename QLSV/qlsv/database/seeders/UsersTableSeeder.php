<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            ['email'=> 'admin@abc.com',
                'name'=>'admin',
                'password'=>bcrypt('123456')
        ]
        );
    }
}

