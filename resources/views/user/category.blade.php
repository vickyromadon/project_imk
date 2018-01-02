@extends('layouts.templates')

@section('title', 'Category - RentOnCome')

@section('content')
	<div class="total-ads main-grid-border">
		<div class="container">
			<div class="ads-grid">
				<div class="side-bar col-md-3">
					<div class="featured-ads">
						<h2 class="sear-head fer">Store Populer</h2>
							@foreach($stores as $store)
								<div class="featured-ad">
									<a href="/profile_store/{{ $store->id }}">
										<div class="featured-ad-left">
											<img src="{{ asset('images/store') }}/{{$store->picture}}" class="img-thumbnail">
										</div>
										<div class="featured-ad-right">
											<h4>{{ $store->store_name }}</h4>
											<p><strong>Product : </strong>{{ count($store->produk) }}</p>
											<p>
												<i class="glyphicon glyphicon-map-marker"></i>
												{{ $store->user->city }}
											</p>
										</div>
										<div class="clearfix"></div>
									</a>
								</div>
							@endforeach
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="ads-display col-md-9">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
				  		<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							   <div>
									<div id="container">
										<h2 class="sear-head fer">Category {{ $produks[0]->tag->tag_name }}</h2>
										<div class="clearfix"></div>
										<ul class="list">
											@foreach($produks as $produk)
												<a href="/single/{{$produk->id}}">
													<li>
														<img src="{{ asset('images/produk') }}/{{$produk->picture}}" class="img-thumbnail">
														<section class="list-left">
															<h5 class="title">
																{{ $produk->produk_name }}
															</h5>
															<span class="adprice">
																IDR. {{ $produk->price }}
															</span>
															<br>
															<span>
																<strong>
																	Store : {{ $produk->store->store_name }}
																</strong>
															</span>
															<br>
															<span>
																<i class="glyphicon glyphicon-map-marker"></i>
																{{ $produk->store->user->address }},
																{{ $produk->store->user->city }},
																{{ $produk->store->user->province }}
															</span>
														</section>
														<section class="list-right">
															<span class="date">
																<i class="glyphicon glyphicon glyphicon-calendar"></i>
																{{ $produk->created_at }}
															</span>
														</section>
														<div class="clearfix"></div>
													</li> 
												</a>
											@endforeach
										</ul>
									</div>
								</div>
							</div>
							{{ $produks->links() }}
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>	
	</div>
	<!-- // Mobiles -->
@endsection