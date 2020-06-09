<?php

use App\Gender;
use Illuminate\Database\Seeder;

class GenderSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gender::create(
            [
                'code' => "M",
                'gender' => "Male"
            ]
        );
        Gender::create(
            [
                'code' => "F",
                'gender' => "Female"
            ]
        );
        Gender::create(
            [
                'code' => "Non",
                'gender' => "I prefere not to say"
            ]
        );
    }
}
