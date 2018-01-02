@extends('layouts.seller_templates')

@section('content_header')
    <section class="content-header">
        <h1>
            Dashboard Seller <strong>{{ $user->store->store_name }}</strong>
        </h1>
    </section>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
            <div class="inner">
                <h3>{{ count($user->store->produk) }}</h3>
                <p>Products</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $user->store->visitor }}</h3>
                    <p>Visitor Store</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ count($rentals) }}</h3>
                    <p>Product Rental</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
      </div>
@endsection
