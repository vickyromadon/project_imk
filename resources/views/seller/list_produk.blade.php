@extends('layouts.seller_templates')

@section('content_header')
    <section class="content-header">
        <h1>
            List Products
        </h1>
    </section>
@endsection

@section('content')
	<section class="content">
        <div class="box box-primary">
            <div class="box-body">
                {{--<div class="table-responsive">--}}
                    <table id="produk-table" class="table table-bordered table-hover dataTable">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            {{--</div>--}}
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

    <!-- list produk modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="deleteProdukModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" method="post" id="formDeleteProduk">
                    <input type="hidden" id="del-id" name="id" value="">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Delete Produk</h4>
                    </div>

                    <div class="modal-body">
                        <div class="col-xs-12 alert alert-error" id="del-error"></div>
                        <p id="del-success">Are you sure want to delete this Produk?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"
                                data-loading-text="<i class='fa fa-spinner fa-spin'></i>">Yes
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- end modal -->
    
    <!-- edit produk modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="editProdukModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="#" method="post" id="formEditProduk">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Edit Produk</h4>
                    </div>

                    <div class="row">
                        <div class="modal-body">
                            <div class="form-horizontal">
                                <div class="col-md-12">
                                    <input type="hidden" id="edit_id" name="edit_id">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="">Produk Name</label>
                                        <div class="col-sm-8"> 
                                            <input type="text" id="edit_produk_name" name="edit_produk_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="">Quantity</label>
                                        <div class="col-sm-8"> 
                                            <input type="number" id="edit_quantity" name="edit_quantity" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="">Price</label>
                                        <div class="col-sm-8"> 
                                            <input type="text" id="edit_price" name="edit_price" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="">Category</label>
                                        <div class="col-sm-8"> 
                                            <select name="edit_category" id="edit_category">
                                                <option>-- Select Category --</option>
                                                @foreach($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="modal-footer">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary"
                                        data-loading-text="<i class='fa fa-spinner fa-spin'></i>">EDIT
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('javascript')
	<script type="application/javascript" src="{{ asset('datatables/jquery.dataTables.js') }}"></script>

	<script type="application/javascript" src="{{ asset('datatables/dataTables.bootstrap.js') }}"></script>

	<script type="text/javascript">
        jQuery(document).ready(function($) {
            var table = $('#produk-table').DataTable({
                "bFilter": false,
                "ordering": false,
                "processing": true,
                "serverSide": true,
                "lengthChange": true,
                "ajax": {
                    "url": "/seller/list_produk",
                    "type": "POST",
                    "data" : {}
                },
                "columns": [
                    {"data": "produk_name"},
                    {"data": "quantity"},
                    {"data": "price"},
                    {"data": "category"},
                    {"data": "date_created"},
                    {
                        render : function(data, type, row){
                                    return '<a href="#" class="edit-btn btn btn-warning center"><i class="fa fa-pencil"></i></a> &nbsp; <a href="#" class="delete-btn btn btn-danger center" data-id="' + row.id + '"><i class="fa fa-trash"></i> </a>';
                                } 
                    }
                ],
                    "fnCreatedRow" : function(nRow, aData, iDataIndex) {
                                        $(nRow).attr('data', JSON.stringify(aData));
                                    }
            });

            // Delete produk
            $('#produk-table').on('click', '.delete-btn' , function(e){
                $('#deleteProdukModal #del-error').hide();
                $('#deleteProdukModal').modal();
                $('#del-id').val($(this).data('id'));
            });

            $('#formDeleteProduk').submit(function (event) {
                event.preventDefault();
                $('#deleteProdukModal #del-error').hide();
                $('#deleteProdukModal #del-success').hide();                

                $('#deleteProdukModal button[type=submit]').button('loading');
                var _data = $("#formDeleteProduk").serialize();

                $.ajax({
                    url: '/seller/delete',
                    type: 'GET',
                    data: _data,
                    cache: false,
                    success: function (data) {
                        if (data.success) {
                            $('#deleteProdukModal button[type=submit]').button('reset');
                            $('#formDeleteProduk')[0].reset();
                            table.draw();
                            $('#deleteProdukModal #del-success').show();
                            $('#deleteProdukModal').modal('toggle');
                        } else {
                            $('#deleteProdukModal button[type=submit]').button('reset');
                            $('#formDeleteProduk')[0].reset();
                            $('#deleteProdukModal #del-error').text(data.message);
                            $('#deleteProdukModal #del-error').show();
                        }
                    }
                });
            });

            // Edit Produk
            $('#produk-table').on('click', '.edit-btn', function (e) {
                var aData = JSON.parse($(this).parent().parent().attr('data'));
                $('#editProdukModal #edit-error').hide();
                $('#editProdukModal #edit-success').hide();
                $('#edit_id').val(aData.id);
                $('#edit_produk_name').val(aData.produk_name);
                $('#edit_quantity').val(aData.quantity);
                $('#edit_price').val(aData.price);
                $('#editProdukModal').modal();
            });

            $('#formEditProduk').submit(function (event) {
                event.preventDefault();
                $('#editProdukModal #edit-error').hide();
                $('#editProdukModal #edit-success').hide();                
                $('#editProdukModal button[type=submit]').button('loading');
                var _data = $("#formEditProduk").serialize();

                $.ajax({
                    url: '/seller/edit',
                    type: 'POST',
                    data: _data,
                    cache: false,
                    success: function (data) {
                        console.log(data);
                        if (data.success) {
                            $('#editProdukModal button[type=submit]').button('reset');
                            $('#formEditProduk')[0].reset();
                            $('#edit-success').text("Edit Data Produk Submitted");
                            $('#edit-success').show();
                            table.draw();
                            setTimeout(function(){$('#editProdukModal').modal('hide');},1000);

                        } else {
                            $('#editProdukModal button[type=submit]').button('reset');
                            $('#formEditProduk')[0].reset();
                            $('#edit-error').text(data.message);
                            $('#edit-error').show();
                        }
                    }
                });
            });
        });
    </script>
@endsection