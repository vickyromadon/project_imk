@extends('layouts.templates')

@section('title', 'Single - RentOnCome')

@section('content')
	<div class="single-page main-grid-border">
		<div class="container">
			<div class="product-desc">
				<div class="col-md-7 product-view">
					<h2>{{ $produks->produk_name }}</h2>
					<p>
						<i class="glyphicon glyphicon-time"></i>
						Added at {{ $produks->created_at }}</p>
					
					<div class="flexslider">
						<img src="{{ asset('images/produk') }}/{{ $produks->picture }}" class="img-thumbnail">	
					</div>

					<div class="product-details">
						<h3><i class="glyphicon glyphicon-user"></i>&nbsp;
							Owner : {{ $produks->store->user->first_name }} {{ $produks->store->user->last_name }}
						</h3>
						<h4><i class="glyphicon glyphicon-map-marker"></i>&nbsp;
							Address : {{ $produks->store->user->address }},
							{{ $produks->store->user->city }},
							{{ $produks->store->user->province }}
						</h4>
						<h4><i class="glyphicon glyphicon-tags"></i>&nbsp;
							Category : {{ $produks->tag->tag_name }}
						</h4>
						<h4><i class="glyphicon glyphicon-eye-open"></i>&nbsp;
							Views : <strong>{{ $produks->views }}</strong>
						</h4>
						<p><strong>Description</strong> : {{ $produks->deskripsi }}</p>
					</div>
				</div>
				<div class="col-md-5 product-details-grid">
					<div class="item-price">
						<div class="product-price">
							<p class="p-price">Price</p>
							<h4 class="rate">IDR. {{ $produks->price }}</h4>
							<div class="clearfix"></div>
						</div>
						<div class="condition">
							<p class="p-price">Quantity</p>
							<h4>{{ $produks->quantity }}</h4>
							<div class="clearfix"></div>
						</div>
						<div class="itemtype">
							<p class="p-price">Store Name</p>
							<h4>{{ $produks->store->store_name }}</h4>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="interested text-center">
						<h4>Interested in this Ad?<small> Contact the Seller!</small></h4>
						<p><i class="glyphicon glyphicon-earphone"></i>
							{{ $produks->store->user->number_phone }}
						</p>
					</div>
					
					@if( !empty(Auth::user()) AND Auth::user()->id != $produks->store->user->id )
						@if( empty($produks->rental->user_id) )
							<div class="interested" style="background-color: #fff; padding-top: 0px;">
								@if( $produks->quantity > 0 )
									<a href="" class="col-md-12 btn btn-warning" data-toggle="modal" data-target="#RentalModal"><strong>Rental</strong></a>
								@else
									<h3><span class="label label-danger">Sorry !, Availability Of Empty Products</span></h3>
								@endif
							</div>
						@else
							<div class="interested" style="background-color: #fff; padding-top: 0px;">
								<h3><span class="label label-warning">The Product you are Renting</span></h3>
							</div>
						@endif
					@endif


				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="RentalModal" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Request For Rental of Products</h4>
				</div>
				<form action="/rental/{{ Auth::user()->id }}" method="POST">
					{{ csrf_field() }}
					<input type="hidden" id="id_produk" name="id_produk" value="{{ $produks->id }}">
					<div class="modal-body">
						<p style="text-align: center; color: red;">
							Fill in the Start Date of the Lease and the end of the Lease to Request the Rental of the Product
						</p>
						<div class="form-group">
							<label>Start Rent : </label>
							<input type="date" class="form-control" id="start" name="start">
						</div>
						<div class="form-group">
							<label>End of The Lease : </label>
							<input type="date" class="form-control" id="end" name="end">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input type="submit" class="btn btn-info" value="Request">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection