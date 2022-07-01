<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;


class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++)
            ClassModel::create(['name'=>"Lop $i", 'description'=>"Thong tin ve lop $i"]);
    }
}
