@extends('layouts.seller_templates')

@section('css')
	<!-- Select2 -->
  	<link rel="stylesheet" href="{{ asset('select2/css/select2.min.css') }}">
@endsection

@section('content_header')
    <section class="content-header">
        <h1>
            Add Products
        </h1>
    </section>
@endsection

@section('content')
<div class="box box-info">
	<div class="box-header with-border">
		<h3 class="box-title">Horizontal Form</h3>
	</div>
<!-- /.box-header -->
<!-- form start -->
	<form action="/seller/add_produk" class="form-horizontal" method="POST" enctype="multipart/form-data">
		<div class="box-body">
			{{ csrf_field() }}
			<input type="hidden" id="id_store" name="id_store" value="{{ $user->store->id }}">
			<div class="form-group">
				<label class="col-sm-2">Category : </label>
				<div class="col-sm-5">
	                <select class="form-control select2" id="category" name="category">
                		<option>-- Select Category --</option>
						@foreach($tags as $tag)
							<option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
						@endforeach
                	</select>
                	@if($errors->has('category'))
                    	<span class="help-block" style="color:red;">{{ $errors->first('category') }}</span>
                	@endif
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Product Name : </label>

				<div class="col-sm-10">
					<input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
					@if($errors->has('name'))
                    	<span class="help-block" style="color:red;">{{ $errors->first('name') }}</span>
                	@endif
				</div>
				
			</div>
			<div class="form-group">
				<label class="col-sm-2">Quantity Product : </label>

				<div class="col-sm-3">
					<input type="number" class="form-control" id="quantity" name="quantity" >
					@if($errors->has('quantity'))
	                    <span class="help-block" style="color:red;">{{ $errors->first('quantity') }}</span>
	                @endif
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Price Product : </label>
				<div class="col-sm-10">
					<div class="input-group">
		        		<span class="input-group-addon">IDR</span>
		        		<input type="text" class="form-control" id="price" name="price" placeholder="100000">
		          	</div>
					@if($errors->has('price'))
	                    <span class="help-block" style="color:red;">{{ $errors->first('price') }}</span>
	                @endif
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Picture Product : </label>

				<div class="col-sm-3">
					<input type="file" id="picture" name="picture" >
					@if($errors->has('picture'))
	                    <span class="help-block" style="color:red;">{{ $errors->first('picture') }}</span>
	                @endif
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2">Deskripsi : </label>

				<div class="col-sm-3">
					<textarea name="deskripsi" id="deskripsi" cols="114" rows="10" placeholder="Your Deskription Product"></textarea>
					@if($errors->has('deskripsi'))
	                    <span class="help-block" style="color:red;">{{ $errors->first('deskripsi') }}</span>
	                @endif
				</div>
			</div>
		</div>
	<!-- /.box-body -->
	<div class="box-footer">
		<button type="submit" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add</button>
	</div>
	<!-- /.box-footer -->
	</form>
</div>
@endsection

@section('javascript')
	<!-- Select2 -->
	<script src="{{ asset('select2/js/select2.full.min.js') }}"></script>

	<script>
	  	$(function () {
		    //Initialize Select2 Elements
		    $('.select2').select2()
		});
	</script>
@endsection
