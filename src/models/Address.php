<?php namespace Byznaga\Dressing;

use Byznaga\Oregano\Models\Oregano as OreganoModel;

class Address extends OreganoModel {

    protected $table = 'addresses';
    public $timestamps = false;

    protected static $labels = array(
    	'id' => 'ID', 
    	'street' => 'Street', 
    	'street_additional' => 'Street Additional', 
    	'city' => 'City', 
    	'state_province_code_2_digit' => 'State / Province 2 Digit', 
    	'zip' => 'Zip', 
    	'country_region_code_2_digit' => 'Country / Region 2 Digit', 
    	'country_region_code_3_digit' => 'Country / Region 3 Digit', 
    	'lat' => 'Lat', 
    	'long' => 'Long'
    );

    protected static $rules = array(
		'street' => array('required'),
		'city' => array('required'),
		'state_province_code_2_digit' => array('required'),
		'country_region_code_2_digit' => array('required'),
	);

    protected static $showOnCreate = array(
        'street' => 'text',
        'street_additional' => 'text',
        'city' => 'text',
        'state_province_code_2_digit' => 'text',
        'zip' => 'text',
        'country_region_code_2_digit' => 'text',
        'lat' => 'text',
        'long' => 'text'
    );

    protected static $showOnEdit = array(
        'id' => 'text',
        'street' => 'text',
        'street_additional' => 'text',
        'city' => 'text',
        'state_province_code_2_digit' => 'text',
        'zip' => 'text',
        'country_region_code_2_digit' => 'text',
        'lat' => 'text',
        'long' => 'text'
    );

}
