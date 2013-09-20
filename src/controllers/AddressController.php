<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

class AddressController extends \BaseController {

	/**
     * The layout that should be used for responses.
     */
    protected $layout = 'dressing::dressing.layouts.master';

    public function __construct()
    {
    	App::error(function(ModelNotFoundException $e)
		{
		    return Response::make('Address Not Found', 404);
		});
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout->content = View::make('dressing::dressing.tables.addresses');	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('dressing::dressing.forms.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$rules = array(
			'street' => array('required'),
			'city' => array('required'),
			'state_province_code_2_digit' => array('required'),
			'country_region_code_2_digit' => array('required'),
		);

	    $validator = Validator::make(Input::all(), $rules);

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
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$address = Address::findOrFail($id);
		$this->layout->content = View::make('dressing::dressing.display.address', array('address'=>$address));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$address = Address::findOrFail($id);
		$this->layout->content = View::make('dressing::dressing.forms.edit', array('address'=>$address));
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
		
		$rules = array(
			'street' => array('required'),
			'city' => array('required'),
			'state_province_code_2_digit' => array('required'),
			'country_region_code_2_digit' => array('required'),
		);

	    $validator = Validator::make(Input::all(), $rules);

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