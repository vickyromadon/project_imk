@extends('layouts.templates')

@section('title', 'Index - RentOnCome')

@section('content')
	<div class="container jarak_atas">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-3">
						<img class="img-thumbnail img-ukuran" src="/images/users/{{ $user->picture }}">
					</div>
					<div class="col-md-9">

						@if( Auth::user()->name == $user->name )
							<div class="spasi_bawah">
								<a href="/profile/edit/{{ $user->id }}" class="label label-warning"><i class="fa fa-cog" aria-hidden="true"></i> Ubah</a>
							</div>
						@endif

						<div class="spasi_bawah nama_profile">
							<h3>{{ $user->first_name }} {{ $user->last_name }}</h3>
						</div>
						<div class="list-group spasi_atas">
							<a href="#" class="list-group-item"><i class="fa fa-envelope" aria-hidden="true"></i> 
								{{ $user->email }}
							</a>
							<a href="#" class="list-group-item"><i class="fa fa-phone" aria-hidden="true"></i> 
								{{ $user->number_phone ?: '&nbsp;-' }} 
							</a>
							<a href="#" class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i>
								{{ $user->created_at }}
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="jarak_atas"></div>
@endsection