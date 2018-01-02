@extends('layouts.seller_templates')

@section('content_header')
    <section class="content-header">
        <h1>
            History Rental
        </h1>
    </section>
@endsection

@section('content')
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box">
				<div class="box-header with-border">
				<h3 class="box-title">Store {{ $user->store->store_name }}</h3>
				</div>
				<!-- /.box-header -->
					<div class="box-body">
						<table class="table table-bordered">
							<tr>
								<th>Product Name</th>
								<th>Renter</th>
								<th>Start Rent</th>
								<th>End Rent</th>
								<th>Status</th>
								<th>Action</th>
							</tr>

							@foreach($rentals as $rental)
								<tr>
									<td>{{ $rental->produk->produk_name }}</td>
									<td>
										{{ $rental->user->first_name }} {{ $rental->user->last_name }}
									</td>
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
									<td>
										<form action="/seller/history/action/{{ $rental->produk->rental->id }}" method="POST">
											{{ csrf_field() }}

											<label class="radio-inline">
												<input type="radio" name="choice" id="choice" value="1">Approve
											</label>
											<label class="radio-inline">
												<input type="radio" name="choice" id="choice" value="2">Rejected
											</label>
											<label class="radio-inline">
												<input type="radio" name="choice" id="choice" value="3">Time Out
											</label> 
											<label class="radio-inline">
												<input type="radio" name="choice" id="choice" value="4">Already Back
											</label>

											<input type="submit" class="btn btn-default" value="Submit">
										</form>
									</td>
								</tr>
							@endforeach
						</table>
					</div>
				</div>
				<!-- /.box -->
			</div>
		</div>
	</section>
@endsection