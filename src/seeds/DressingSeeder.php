<?php

use Illuminate\Database\Seeder;

class DressingSeeder extends Seeder {

    public function run()
    {
        StateProvince::create(array('state_province'=>'ab', 'state_province_code_2_digit'=>'ab'));
    }

}
