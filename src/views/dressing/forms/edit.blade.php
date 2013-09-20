

@section('content')

	<ul>
	@foreach ($errors->all('<li>:message</li>') as $message)
		{{ $message }}
	@endforeach
	</ul>

	<form id="AddressForm" action="/dressing/address/{{$address->id}}/edit" method="POST">
		<div>
			<label>Street:</label>
			<input type="text" name="street" maxlength="45" value="{{$address->street}}" />
		</div>
		<div>
			<label>Street (Additional):</label>
			<input type="text" name="street_additional" maxlength="45" value="{{$address->street_additional}}" />
		</div>
		<div>
			<label>City:</label>
			<input type="text" name="city" maxlength="45" value="{{$address->city}}" />
		</div>
		<div>
			<label>Country / Region:</label>
			{{ Dressing::selectCountryRegions('country_region_code_2_digit', $address->country_region_code_2_digit) }}
		</div>
		<div>
			<label>State / Province:</label>
			{{ Dressing::selectStateProvinces('state_province_code_2_digit', $address->state_province_code_2_digit) }}
		</div>
		<div>
			<label>Zip Code:</label>
			<input type="text" name="zip" maxlength="11" value="{{$address->zip}}" />
		</div>
		<div>
			<label>Latitude:</label>
			<input type="text" name="lat" maxlength="100" value="{{$address->lat}}" />
		</div>
		<div>
			<label>Longitude:</label>
			<input type="text" name="long" maxlength="100" value="{{$address->long}}" />
		</div>
		<div>
			<input type="submit" value="Submit" />
		</div>
	</form>

@stop