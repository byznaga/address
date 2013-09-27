<?php


Route::get('/dressing/state_provinces', function()
{
	echo json_encode(Dressing::getStateProvinces());
});

Route::get('/dressing/state_province/{code?}', function($code = '')
{
	if ($state_provinces = Dressing::getStateProvinceByCode($code))
	{
		echo json_encode($state_provinces);
	}
	else
	{
		App::abort(404, 'State/province not found');
	}
});

Route::get('/dressing/country_regions', function()
{
	echo json_encode(Dressing::getCountryRegions());
});

Route::get('/dressing/country_region/{code?}', function($code = '')
{
	if ($country_regions = Dressing::getCountryRegionByCode($code))
	{
		echo json_encode($country_regions);
	}
	else
	{
		App::abort(404, 'Country/region not found');
	}
});

Route::get('/dressing/country_regions/state_provinces/{digits?}', function($digits = '2')
{
	echo json_encode(Dressing::getStateProvincesByCountryRegions($digits));
});

Route::get('/dressing/country_region/{code?}/state_provinces', function($code = '')
{
	if ($state_provinces = Dressing::getStateProvincesByCountryRegionCode($code))
	{
		echo json_encode($state_provinces);
	}
	else
	{
		App::abort(404, 'State/provinces not found');
	}
});

Route::resource('/dressing/address', 'AddressController');
