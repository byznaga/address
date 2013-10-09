<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Byznaga\Dressing\Address as Address;
use Byznaga\Oregano\LayoutController as LayoutController;

class AddressController extends LayoutController {

	protected $route = '/dressing/address';

    public function __construct()
    {
    	App::error(function(ModelNotFoundException $e)
		{
		    return Response::make('Address Not Found', 404);
		});
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	    $validator = Validator::make(Input::all(), Address::getRules());

	    if ($validator->fails())
	    {
	        return Redirect::to('dressing/address/create')->withErrors($validator);
	    }
	    else
	    {
		    $countryRegion = Dressing::getCountryRegionBy2DigitCode(Input::get('country_region_code_2_digit'));

			$address = new Address;
			$address->street = Input::get('street');
			$address->street_additional = Input::get('street_additional');
			$address->city = Input::get('city');
			$address->state_province_code_2_digit = Input::get('state_province_code_2_digit');
			$address->zip = Input::get('zip');
			$address->country_region_code_2_digit = Input::get('country_region_code_2_digit');
			$address->country_region_code_3_digit = $countryRegion['code_3_digit'];
			$address->lat = Input::get('lat');
			$address->long = Input::get('long');
			$address->save();

			return Redirect::to('dressing/address');
		}

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$address = Address::findOrFail($id);
		
	    $validator = Validator::make(Input::all(), Address::getRules());

	    if ($validator->fails())
	    {
	        return Redirect::to('dressing/address/'.$id.'/edit')->withErrors($validator);
	    }
	    else
	    {
		    $countryRegion = Dressing::getCountryRegionBy2DigitCode(Input::get('country_region_code_2_digit'));

			$address->street = Input::get('street');
			$address->street_additional = Input::get('street_additional');
			$address->city = Input::get('city');
			$address->state_province_code_2_digit = Input::get('state_province_code_2_digit');
			$address->zip = Input::get('zip');
			$address->country_region_code_2_digit = Input::get('country_region_code_2_digit');
			$address->country_region_code_3_digit = $countryRegion['code_3_digit'];
			$address->lat = Input::get('lat');
			$address->long = Input::get('long');
			$address->save();

			return Redirect::to('dressing/address');
			
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$address = Address::findOrFail($id);
	}

}