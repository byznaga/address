

@section('content')

	<ul>
	@foreach ($errors->all('<li>:message</li>') as $message)
		{{ $message }}
	@endforeach
	</ul>

	<form id="AddressForm" action="/dressing/address" method="POST">
		<div>
			<label>Street:</label>
			<input type="text" name="street" maxlength="45" />
		</div>
		<div>
			<label>Street (Additional):</label>
			<input type="text" name="street_additional" maxlength="45" />
		</div>
		<div>
			<label>City:</label>
			<input type="text" name="city" maxlength="45" />
		</div>
		<div>
			<label>Country / Region:</label>
			{{ Dressing::selectCountryRegions('country_region_code_2_digit') }}
		</div>
		<div>
			<label>State / Province:</label>
			{{ Dressing::selectStateProvinces('state_province_code_2_digit') }}
		</div>
		<div>
			<label>Zip Code:</label>
			<input type="text" name="zip" maxlength="11" />
		</div>
		<div>
			<label>Latitude:</label>
			<input type="text" name="lat" maxlength="100" />
		</div>
		<div>
			<label>Longitude:</label>
			<input type="text" name="long" maxlength="100" />
		</div>
		<div>
			<input type="submit" value="Submit" />
		</div>
	</form>

@stop