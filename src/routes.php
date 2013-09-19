<?php

Route::get('/dressing/state_provinces', function($code = '')
{
	echo json_encode(Dressing::getStateProvinces());
});

Route::get('/dressing/state_province/{code?}', function($code = '')
{
	echo json_encode(Dressing::getStateProvinceByCode($code));
});

Route::get('/dressing/country_regions', function($code = '')
{
	echo json_encode(Dressing::getCountryRegions());
});

Route::get('/dressing/country_region/{code?}', function($code = '')
{
	echo json_encode(Dressing::getCountryRegionByCode($code));
});

Route::get('/dressing/country_region/{code?}/state_provinces', function($code = '')
{
	echo json_encode(Dressing::getStateProvincesByCountryRegionCode($code));
});