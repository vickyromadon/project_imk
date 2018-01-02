@extends('layouts.templates')

@section('content')
<!-- Profile Image -->
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body box-profile">
					<img class="profile-user-img img-responsive img-circle" src="{{ asset('/images/store') }}/{{ $user->store->picture }}">

					<h3 class="profile-username text-center">{{ $user->store->store_name }}</h3>

					<p class="text-muted text-center">{{ $user->first_name }} {{ $user->last_name }}</p>

					<ul class="list-group list-group-unbordered">
						<li class="list-group-item">
							<b>Product</b> <a class="pull-right">{{ count($user->store->produk) }}</a>
						</li>
						<li class="list-group-item">
							<b>Visitor</b> <a class="pull-right">{{ $user->store->visitor }}</a>
						</li>
						<li class="list-group-item">
							<b>Product Rental</b> <a class="pull-right">{{ count($rentals) }}</a>
						</li>
					</ul>
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="page-header" style="border-bottom: 1px solid #3f3f3f;">
			  	<h1 style="text-align: center;">All Product</h1>
			</div>
		</div>

		@foreach($produks as $produk)
			<div class="col-md-3">
				<div class="box box-danger">
					<div class="box-body box-profile">
						<img class="profile-user-img img-responsive img-circle" src="{{ asset('/images/produk') }}/{{ $produk->picture }}">

						<h3 class="profile-username text-center">{{ $produk->produk_name }}</h3>

						<ul class="list-group list-group-unbordered">
							<li class="list-group-item">
								<b>Price</b> <a class="pull-right">IDR. {{ $produk->price }}</a>
							</li>
							<li class="list-group-item">
								<b>Quantity</b> <a class="pull-right">{{ $produk->quantity }}</a>
							</li>
							<li class="list-group-item">
								<b>Views</b> <a class="pull-right">{{ $produk->views }}</a>
							</li>
						</ul>
						<a href="/single/{{ $produk->id }}" class="btn btn-success btn-block"><b>View</b></a>
					</div><!-- /.box-body -->
				</div><!-- /.box -->
			</div>
		@endforeach
	</div>

	<div class="row">
		<div class="col-md-12">
			{{ $produks->links() }}
		</div>
	</div>
</div>
@endsection
