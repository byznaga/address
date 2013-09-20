
@section('content')

	<table border="1">
		<thead>
			<tr>
				<th>ID</th>
				<th>Street</th>
				<th>Street (Additional)</th>
				<th>City</th>
				<th>State / Province</th>
				<th>Country / Region</th>
				<th>Zip Code</th>
				<th>Lat</th>
				<th>Long</th>
			</tr>
		</thead>
		<tbody>
			@foreach (Address::all() as $row)
				<tr>
					<td>{{ HTML::link('/dressing/address/' . $row->id, $row->id) }}</td>
					<td>{{ $row->street }}</td>
					<td>{{ $row->street_additional }}</td>
					<td>{{ $row->city }}</td>
					<td>{{ $row->state_province_code_2_digit }}</td>
					<td>{{ $row->country_region_code_2_digit }}</td>
					<td>{{ $row->zip }}</td>
					<td>{{ $row->lat }}</td>
					<td>{{ $row->long }}</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop