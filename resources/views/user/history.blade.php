@extends('layouts.templates')

@section('title', 'History - RentOnCome')

@section('content')
	<div class="container">                                                                                      
		<div class="table-responsive">          
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Store Name</th>
						<th>Produk Name</th>
						<th>Start Rental</th>
						<th>End Rental</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					@foreach($rentals as $rental)
						<tr>
							<td>{{ $rental->user->store->store_name }}</td>
							<td>{{ $rental->produk->produk_name }}</td>
							<td>{{ $rental->start_rent }}</td>
							<td>{{ $rental->end_rent }}</td>
							<td>
								@if( $rental->status == 0 )
									<span class="label label-warning">PENDING</span>
								@elseif( $rental->status == 1 )
									<span class="label label-success">APPROVE</span>
								@elseif( $rental->status == 2 )
									<span class="label label-danger">REJECTED</span>
								@elseif( $rental->status == 3 )
									<span class="label label-danger">TIME OUT</span>
								@elseif( $rental->status == 4 )
									<span class="label label-info">ALREADRY BACK</span>
								@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection