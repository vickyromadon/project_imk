@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                
                @if( Auth::user()->role == 0 )
                    <div class="alert alert-success">
                        <p>Selamat Datang Admin</p>
                        {{ session('status') }}
                    </div>
                @elseif( Auth::user()->role == 1 )
                    <div class="alert alert-success">
                        <p>Selamat Datang Seller</p>
                        {{ session('status') }}
                    </div>
                @else
                    <div class="alert alert-success">
                        <p>Selamat Datang User</p>
                        {{ session('status') }}
                    </div>
                @endif            
            </div>
        </div>
    </div>
</div>
@endsection
