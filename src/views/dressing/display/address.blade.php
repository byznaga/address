

@section('content')

	<div>
		<label>Street:</label>
		{{ $address->street }}
	</div>
	<div>
		<label>Street (Additional):</label>
		{{ $address->street_additional }}
	</div>
	<div>
		<label>City:</label>
		{{ $address->city }}
	</div>
	<div>
		<label>Country / Region:</label>
		{{ $address->country_region_code_2_digit }}
	</div>
	<div>
		<label>State / Province:</label>
		{{ $address->state_province_code_2_digit }}
	</div>
	<div>
		<label>Zip Code:</label>
		{{ $address->zip }}
	</div>
	<div>
		<label>Latitude:</label>
		{{ $address->lat }}
	</div>
	<div>
		<label>Longitude:</label>
		{{ $address->long }}
	</div>

@stop