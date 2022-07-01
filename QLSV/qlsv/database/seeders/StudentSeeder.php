<?php

namespace Database\Seeders;

use App\Models\StudentModel;
use Illuminate\Database\Seeder;
use Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0;$i<100;$i++){
            StudentModel::create([
                'fullname'=>$faker->name,
                'DOB' => $faker->date($format='Y-m-d', $max='now'),
                'sex' => $faker -> boolean,
                'address'=>$faker->address,
                'class_id'=>random_int(1,10),
                'description' => $faker->text,
                'email'=> $faker->email,
                'username'=>$faker->username,
                'password'=>$faker->password
                
            ]);
        }
    }
}
