<?php namespace Byznaga\Dressing;

use Config;
use CountryRegion;
use StateProvince;

class Dressing {

	protected $countryRegions = null;
	protected $stateProvinces = null;

	protected $countryRegionsByName = null;
	protected $stateProvincesByName = null;

	protected $countryRegionsByID = null;
	protected $countryRegionsBy2DigitCode = null;
	protected $countryRegionsBy3DigitCode = null;
	protected $stateProvincesBy2DigitCode = null;
	protected $stateProvincesByCountryCode2Digit = null;
	protected $stateProvincesByCountryCode3Digit = null;

	public function __construct()
	{

		$countryRegions = CountryRegion::all();
		foreach ($countryRegions as $row)
		{
			$this->countryRegions[] = array('id' => $row['id'], 'name' => $row['name'], 'code_2_digit' => $row['code_2_digit'], 'code_3_digit' => $row['code_3_digit']);
		}

		$stateProvinces = StateProvince::all();
		foreach ($stateProvinces as $row)
		{
			$this->stateProvinces[] = array('id' => $row['id'], 'name' => $row['name'], 'code_2_digit' => $row['code_2_digit'], 'country_region_id' => $row['country_region_id']);
		}

		foreach ($this->countryRegions as $row)
		{
			$this->countryRegionsByID[$row['id']] = $row;
			$this->countryRegionsByName[$row['name']] = $row;
			$this->countryRegionsBy2DigitCode[$row['code_2_digit']] = $row;
			$this->countryRegionsBy3DigitCode[$row['code_3_digit']] = $row;
		}

		foreach ($this->stateProvinces as $row)
		{
			$this->stateProvincesByName[$row['name']] = $row;
			$this->stateProvincesBy2DigitCode[$row['code_2_digit']] = $row;
			if (isset($this->countryRegionsByID[$row['country_region_id']]['code_2_digit']))
			{
				$this->stateProvincesByCountryCode2Digit[$this->countryRegionsByID[$row['country_region_id']]['code_2_digit']][] = $row;
				$this->stateProvincesByCountryCode3Digit[$this->countryRegionsByID[$row['country_region_id']]['code_3_digit']][] = $row;
			}
		}

	}

	public function test()
	{
		print_r($this->stateProvincesByCountryCode2Digit);
	}

}