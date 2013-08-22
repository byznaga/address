<?php

use Illuminate\Database\Seeder;

class DressingSeeder extends Seeder {

    public function run()
    {
    	$this->seedCountryRegions();
    	$this->seedStateProvinces();        
    }

    private function seedCountryRegions()
    {

    	$data = Config::get('dressing::country_regions');

		DB::table('country_regions')->truncate();

    	foreach ($data as $row)
    	{
    		CountryRegion::create($row);
    	}
    }

    private function seedStateProvinces()
    {

    	DB::table('state_provinces')->truncate();

    	$usaData = Config::get('dressing::usa_states');
		foreach ($usaData as $row)
    	{
    		$row['country_region_id'] = '226';
    		StateProvince::create($row);
    	}

		$canadaData = Config::get('dressing::canada_provinces');
		foreach ($canadaData as $row)
    	{
    		$row['country_region_id'] = '38';
    		StateProvince::create($row);
    	}

		$mexicoData = Config::get('dressing::mexico_states');
		foreach ($mexicoData as $row)
    	{
    		$row['country_region_id'] = '140';
    		StateProvince::create($row);
    	}

		$brazilData = Config::get('dressing::brazil_states');
		foreach ($brazilData as $row)
    	{
    		$row['country_region_id'] = '30';
    		StateProvince::create($row);
    	}

		$australiaData = Config::get('dressing::australia_states');
    	foreach ($australiaData as $row)
    	{
    		$row['country_region_id'] = '13';
    		StateProvince::create($row);
    	}

    }

}
