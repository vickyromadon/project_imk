@extends('layouts.templates')

@section('title', 'Index - RentOnCome')

@section('content')
	<div class="main-banner banner text-center">
		<div class="container">    
			<h1>A MARKET PLACE FOR RENTAL OF PRODUCTS</h1>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
			<a href="/howitwork">How it works</a>
		</div>
	</div>
	<div class="content">
	    <div class="categories">
	        <div class="container">
	            <div class="col-md-2 focus-grid">
	                <a href="/category/1">
	                    <div class="focus-border">
	                        <div class="focus-layout">
	                            <div class="focus-image"><i class="fa fa-music"></i></div>
	                            <h4 class="clrchg">Musical Instruments</h4>
	                        </div>
	                    </div>
	                </a>
	            </div>
	            <div class="col-md-2 focus-grid">
	                <a href="/category/2">
	                    <div class="focus-border">
	                        <div class="focus-layout">
	                            <div class="focus-image"><i class="fa fa-laptop"></i></div>
	                            <h4 class="clrchg"> Electronics & Appliances</h4>
	                        </div>
	                    </div>
	                </a>
	            </div>
	            <div class="col-md-2 focus-grid">
	                <a href="/category/3">
	                    <div class="focus-border">
	                        <div class="focus-layout">
	                            <div class="focus-image"><i class="fa fa-car"></i></div>
	                            <h4 class="clrchg">Vehicles</h4>
	                        </div>
	                    </div>
	                </a>
	            </div>	
	            <div class="col-md-2 focus-grid">
	                <a href="/category/4">
	                    <div class="focus-border">
	                        <div class="focus-layout">
	                            <div class="focus-image"><i class="fa fa-motorcycle"></i></div>
	                            <h4 class="clrchg">Bikes & Scooters</h4>
	                        </div>
	                    </div>
	                </a>
	            </div>	
	            <div class="col-md-2 focus-grid">
	                <a href="/category/5">
	                    <div class="focus-border">
	                        <div class="focus-layout">
	                            <div class="focus-image"><i class="fa fa-wheelchair"></i></div>
	                            <h4 class="clrchg">Furnitures</h4>
	                        </div>
	                    </div>
	                </a>
	            </div>
	            <div class="col-md-2 focus-grid">
	                <a href="/category/6">
	                    <div class="focus-border">
	                        <div class="focus-layout">
	                            <div class="focus-image"><i class="fa fa-bullhorn"></i></div>
	                            <h4 class="clrchg">Audio Visual Equipment</h4>
	                        </div>
	                    </div>
	                </a>
	            </div>	
	            <div class="col-md-2 focus-grid">
	                <a href="/category/7">
	                    <div class="focus-border">
	                        <div class="focus-layout">
	                            <div class="focus-image"><i class="fa fa-table"></i></div>
	                            <h4 class="clrchg">Office Furniture</h4>
	                        </div>
	                    </div>
	                </a>
	            </div>	
	            <div class="col-md-2 focus-grid">
	                <a href="/category/8">
	                    <div class="focus-border">
	                        <div class="focus-layout">
	                            <div class="focus-image"><i class="fa fa-female"></i></div>
	                            <h4 class="clrchg">Costumes, Dresses and Accessories</h4>
	                        </div>
	                    </div>
	                </a>
	            </div>	
	            <div class="col-md-2 focus-grid">
	                <a href="/category/9">
	                    <div class="focus-border">
	                        <div class="focus-layout">
	                            <div class="focus-image"><i class="fa fa-gamepad"></i></div>
	                            <h4 class="clrchg">Baby Accessories and Toys</h4>
	                        </div>
	                    </div>
	                </a>
	            </div>	
	            <div class="col-md-2 focus-grid">
	                <a href="/category/10">
	                    <div class="focus-border">
	                        <div class="focus-layout">
	                            <div class="focus-image"><i class="fa fa-tasks"></i></div>
	                            <h4 class="clrchg">Event and Wedding Supplies</h4>
	                        </div>
	                    </div>
	                </a>
	            </div>
	            <div class="col-md-2 focus-grid">
	                <a href="/category/11">
	                    <div class="focus-border">
	                        <div class="focus-layout">
	                            <div class="focus-image"><i class="fa fa-binoculars"></i></div>
	                            <h4 class="clrchg">Adventure Gear</h4>
	                        </div>
	                    </div>
	                </a>
	            </div>
	            <div class="col-md-2 focus-grid">
	                <a href="/category/12">
	                    <div class="focus-border">
	                        <div class="focus-layout">
	                            <div class="focus-image"><i class="fa fa-medkit"></i></div>
	                            <h4 class="clrchg">Medical Supplies</h4>
	                        </div>
	                    </div>
	                </a>
	            </div>
	            <div class="clearfix"></div>
	        </div>
	    </div>
		<div class="trending-ads">
			<div class="container">
				<!-- slider -->
				<div class="trend-ads">
					<h2>Trending Ads</h2>
					<ul id="flexiselDemo3">
						<li>
							@for($i=0; $i<4; $i++)
								<div class="col-md-3 biseller-column">
									<a href="/single/{{$produks[$i]->id}}">
										<img src="{{ asset('images/produk') }}/{{$produks[$i]->picture}}"/>
										<span class="price">IDR. {{ $produks[$i]->price }}</span>
									</a> 
									<div class="ad-info">
										<h5>{{ $produks[$i]->produk_name }}</h5>
										<span>Stock Ready : {{ $produks[$i]->quantity }}</span>
									</div>
								</div>
							@endfor
						</li>
						<li>
							@for($i=4; $i<8; $i++)
								<div class="col-md-3 biseller-column">
									<a href="/single/{{$produks[$i]->id}}">
										<img src="{{ asset('images/produk') }}/{{$produks[$i]->picture}}"/>
										<span class="price">IDR. {{ $produks[$i]->price }}</span>
									</a> 
									<div class="ad-info">
										<h5>{{ $produks[$i]->produk_name }}</h5>
										<span>Stock Ready : {{ $produks[$i]->quantity }}</span>
									</div>
								</div>
							@endfor
						</li>
						<li>
							@for($i=8; $i<12; $i++)
								<div class="col-md-3 biseller-column">
									<a href="/single/{{$produks[$i]->id}}">
										<img src="{{ asset('images/produk') }}/{{$produks[$i]->picture}}"/>
										<span class="price">IDR. {{ $produks[$i]->price }}</span>
									</a> 
									<div class="ad-info">
										<h5>{{ $produks[$i]->produk_name }}</h5>
										<span>Stock Ready : {{ $produks[$i]->quantity }}</span>
									</div>
								</div>
							@endfor
						</li>
					</ul>	   
				</div>   
			</div>				
		</div>
	</div>
	@include('layouts.partials.about')

	@if( !empty(Auth::user()) )
		<div class="modal modal-default fade" id="modal_create_toko">
	        <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                        <span aria-hidden="true">&times;</span>
	                    </button>
	                    <h3 class="modal-title" style="text-align: center">Create Your Shop</h3>
	                    <p style="text-align: center">
	                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores unde tenetur blanditiis doloremque eos officiis ullam at porro quidem assumenda? Impedit reiciendis at nesciunt dolorem iusto aliquid eaque nobis. Dicta.
	                    </p>
	                </div>
	                
	                <form action="create_store/{{ Auth::user()->id }}" enctype="multipart/form-data" method="POST">
	                    {{ csrf_field() }}
	                    <div class="modal-body">
	                        <div class="input-group">
	                            <span class="input-group-addon">
	                                <i class="fa fa-home"></i>
	                            </span>
	                            <input type="text" id="store_name" name="store_name" class="form-control" placeholder="Store Your Name">
	                        </div>
	                        @if($errors->has('store_name'))
	                            <span class="help-block" style="color:red;">{{ $errors->first('store_name') }}</span>
	                        @endif

	                        <br>

	                        <div class="input-group">
	                            <span class="input-group-addon">
	                                <i class="fa fa-barcode"></i>
	                            </span>
	                            <input type="text" id="slogan" name="slogan" class="form-control" placeholder="Store Your Slogan">
	                        </div>
	                        @if($errors->has('slogan'))
	                            <span class="help-block" style="color:red;">{{ $errors->first('slogan') }}</span>
	                        @endif

	                        <br>

	                        <textarea class="textarea" id="deskripsi" name="deskripsi" placeholder="Store Your Description"
	                          style="width: 100%; height: 100px; border: 1px solid #dddddd; padding: 10px;">
	                        </textarea>
	                        @if($errors->has('deskripsi'))
	                            <span class="help-block" style="color:red;">{{ $errors->first('deskripsi') }}</span>
	                        @endif
	                    </div>
	                    <div class="modal-footer">
	                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
	                            Close
	                        </button>
	                        <input type="submit" class="btn btn-info" value="Submit">
	                    </div>
	                </form>
	            </div>
	        <!-- /.modal-content -->
	        </div>
	    <!-- /.modal-dialog -->
	    </div>
	    <!-- /.modal -->
    @endif
@endsection

@section('javascript')
	<script type="text/javascript" src="{{ asset('js/jquery.flexisel.js') }}"></script>
@endsection