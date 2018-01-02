<div class="header">
	<div class="container">
		<div class="logo">
			<a href="/"><span>Rent</span>OnCome</a>
		</div>

		@if( !Auth::check() )
			<div class="header-right">
				<a class="account" href="/login">My Account</a>
				<span class="active uls-trigger">Select language</span>
			</div>
		@else
			<div class="header-right">
				<div class="dropdown">
		    		<button class="dropbtn">
		    			{{ Auth::user()->name }} <span class="glyphicon glyphicon-menu-down panah" aria-hidden="true"></span>
		    		</button>

		    		<div class="dropdown-content">
		    			@if( !empty(Auth::user()->store->id) )
							<a href="/seller">My Store</a>
						@else
							<a href="" data-toggle="modal" data-target="#modal_create_toko">Create Store</a>
		    			@endif
		    			<a href="/profile/{{ Auth::user()->id }}">Profile</a>
		    			<a href="/history/{{ Auth::user()->id }}">History</a>
					    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
		    		</div>

		    	</div>
			</div>
		@endif
	</div>
</div>
