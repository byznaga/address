<?php namespace Byznaga\Dressing;

use Config;
use CountryRegion;
use StateProvince;

/**
 * Main class Dressing handles everything to do with Addresses, States, Countries, and Geocoding
 */
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

	/**
	 * [__construct description]
	 */
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

	/**
	 * [getStateProvinces description]
	 * @return [type] [description]
	 */
	public function getStateProvinces()
	{
		return $this->stateProvinces;
	}

	/**
	 * [getStateProvinceByCode description]
	 * @param  [type] $code [description]
	 * @return [type]       [description]
	 */
	public function getStateProvinceByCode($code)
	{
		if (array_key_exists($code, $this->stateProvincesBy2DigitCode))
		{
			return $this->stateProvincesBy2DigitCode[$code];
		}
		else
		{
			return false;
		}
	}

	/**
	 * [getCountryRegions description]
	 * @return [type] [description]
	 */
	public function getCountryRegions()
	{
		return $this->countryRegions;
	}

	/**
	 * [getCountryRegionBy2DigitCode description]
	 * @param  [type] $code [description]
	 * @return [type]       [description]
	 */
	public function getCountryRegionBy2DigitCode($code)
	{
		if (array_key_exists($code, $this->countryRegionsBy2DigitCode))
		{
			return $this->countryRegionsBy2DigitCode[strtoupper($code)];
		}
		else
		{
			return false;
		}
	}

	/**
	 * [getCountryRegionBy3DigitCode description]
	 * @param  [type] $code [description]
	 * @return [type]       [description]
	 */
	public function getCountryRegionBy3DigitCode($code)
	{
		if (array_key_exists($code, $this->countryRegionsBy3DigitCode))
		{
			return $this->countryRegionsBy3DigitCode[strtoupper($code)];
		}
		else
		{
			return false;
		}
	}

	/**
	 * [getCountryRegionByCode description]
	 * @param  [type] $code [description]
	 * @return [type]       [description]
	 */
	public function getCountryRegionByCode($code)
	{
		if (strlen($code) === 2) 
		{
			return $this->getCountryRegionBy2DigitCode($code);
		} 
		else if (strlen($code) === 3)
		{
			return $this->getCountryRegionBy3DigitCode($code);
		}
		else
		{
			return false;
		}
	}

	/**
	 * [getStateProvincesByCountryRegion2DigitCode description]
	 * @param  [type] $code [description]
	 * @return [type]       [description]
	 */
	public function getStateProvincesByCountryRegion2DigitCode($code) 
	{
		if (array_key_exists($code, $this->stateProvincesByCountryCode2Digit))
		{
			return $this->stateProvincesByCountryCode2Digit[strtoupper($code)];
		}
		else
		{
			return false;
		}
	}

	/**
	 * [getStateProvincesByCountryRegion3DigitCode description]
	 * @param  [type] $code [description]
	 * @return [type]       [description]
	 */
	public function getStateProvincesByCountryRegion3DigitCode($code) 
	{
		if (array_key_exists($code, $this->stateProvincesByCountryCode3Digit))
		{
			return $this->stateProvincesByCountryCode3Digit[strtoupper($code)];
		}
		else
		{
			return false;
		}
	}

	/**
	 * [getStateProvincesByCountryRegionCode description]
	 * @param  [type] $code
	 * @return [type]
	 */
	public function getStateProvincesByCountryRegionCode($code)
	{
		if (strlen($code) === 2) 
		{
			return $this->getStateProvincesByCountryRegion2DigitCode($code);
		} 
		else if (strlen($code) === 3)
		{
			return $this->getStateProvincesByCountryRegion3DigitCode($code);
		}
		else
		{
			return false;
		}
	}

	/**
	 * [getStateProvincesByCountryRegions description]
	 * @param  [type] $digits [description]
	 * @return [type]         [description]
	 */
	public function getStateProvincesByCountryRegions($digits)
	{
		if ($digits == '2') 
		{
			return $this->stateProvincesByCountryCode2Digit;
		} 
		else if ($digits == '3')
		{
			return $this->stateProvincesByCountryCode3Digit;
		}
		else
		{
			return false;
		}
	}

	/**
	 * Creates a drop down HTML form element displaying countries
	 * @param  string $name     The name of the drop down
	 * @param  string $selected The element that will be selected
	 * @return string           The HTML element
	 */
	public function selectCountryRegions($name, $selected = '') 
	{

		$countryRegionList = array('' => '');
		if (count($this->countryRegions) > 0) 
		{
			foreach ($this->countryRegions as $row)
			{
				$countryRegionList[$row['code_2_digit']] = $row['name'];
			}
		}

		return \Form::select($name, $countryRegionList, $selected);

	}

	/**
	 * Creates a drop down HTML form element displaying states
	 * @param  string $name     The name of the drop down
	 * @param  string $selected The element that will be selected
	 * @return string           The HTML element
	 */
	public function selectStateProvinces($name, $selected = '')
	{

		$stateProvinceList = array('' => '');
		if (count($this->stateProvinces) > 0) 
		{
			foreach ($this->stateProvinces as $row)
			{
				$countryRegion = $this->countryRegionsByID[$row['country_region_id']]; 
				$stateProvinceList[$countryRegion['name']][$row['code_2_digit']] = $row['name'];
			}
		}

		return \Form::select($name, $stateProvinceList, $selected);

	}

}