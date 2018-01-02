@extends('layouts.templates')

@section('title', 'Index - RentOnCome')

@section('content')
	<div class="container jarak_atas">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
					<div class="kotak">
						<img class="img-thumbnail img-ukuran" src="/images/users/{{ $user->picture }}" alt="">
						<hr>
						<a data-toggle="modal" data-target="#myModalFotoProfile">
							<button type="button" class="btn btn-default btn-ukuran">Pilih Foto</button>
						</a>
						<p>Besar file: maksimum 10.000.000 bytes (10 Megabytes)<br>
						Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG</p>
					</div>
					<a data-toggle="modal" data-target="#myModalKataSandi">
						<button type="button" class="btn btn-default btn-ukuran margin-atas"><i class="fa fa-key" aria-hidden="true"></i> Ubah Kata Sandi</button>
					</a>

				</div>
				<div class="col-md-8">
					<form action="/profile/edit/biodata/{{ $user->id }}" method="POST">
						{{ csrf_field() }}
						<h4>Ubah Biodata Diri</h4>
						<table class="table">
							<tbody>
								<tr>
									<td>
										<div class="form-group{{ $errors->has('first_name') ? 'has-error' : '' }}">
											<label>Nama Depan :</label>
											<input type="text" class="form-control" id="first_name" name="first_name" value="{{ Request::old('first_name') ?: Auth::user()->first_name }}">
										</div>
										@if($errors->has('first_name'))
											<span class="help-block" style="color:red;">{{ $errors->first('first_name') }}</span>
										@endif
									</td>
									<td>
										<div class="form-group{{ $errors->has('last_name') ? 'has-error' : '' }}">
											<label>Nama Belakang : </label>
											<input type="text" class="form-control" id="last_name" name="last_name" value="{{ Request::old('last_name') ?: Auth::user()->last_name }}">
										</div>
										@if($errors->has('last_name'))
											<span class="help-block" style="color:red;">{{ $errors->first('last_name') }}</span>
										@endif
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
											<label>Alamat : </label>
											<input type="text" class="form-control" id="address" name="address" value="{{ Request::old('address') ?: Auth::user()->address }}">
										</div>
										@if($errors->has('address'))
											<span class="help-block" style="color:red;">{{ $errors->first('address') }}</span>
										@endif
									</td>
								</tr>

								<tr>
									<td>
										<div class="form-group{{ $errors->has('city') ? 'has-error' : '' }}">
											<label>Kota :</label>
											<input type="text" class="form-control" id="city" name="city" value="{{ Request::old('city') ?: Auth::user()->city }}">
										</div>
										@if($errors->has('city'))
											<span class="help-block" style="color:red;">{{ $errors->first('city') }}</span>
										@endif
									</td>
									<td>
										<div class="form-group{{ $errors->has('province') ? 'has-error' : '' }}">
											<label>Provinsi : </label>
											<input type="text" class="form-control" id="province" name="province" value="{{ Request::old('province') ?: Auth::user()->province }}">
										</div>
										@if($errors->has('province'))
											<span class="help-block" style="color:red;">{{ $errors->first('province') }}</span>
										@endif
									</td>
								</tr>
							</tbody>
						</table>

						<h4>Ubah Kontak</h4>
						<table class="table">
							<tbody>
								<tr>
									<td>
										<div class="form-group">
											<label>Email :</label>
											<input type="text" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly="">
											<a data-toggle="modal" data-target="#myModalEmail">Ubah Email</a>
										</div>
										@if($errors->has('email'))
											<span class="help-block" style="color:red;">{{ $errors->first('email') }}</span>
										@endif
									</td>
									<td>
										<div class="form-group">
											<label>Nomor HP</label>
											<input type="text" class="form-control" id="number_phone" name="number_phone" value="{{ Auth::user()->number_phone ?: '-' }}" readonly="">
											<a data-toggle="modal" data-target="#myModalNoHP">Ubah Nomor HP</a>
										</div>
										@if($errors->has('number_phone'))
											<span class="help-block" style="color:red;">{{ $errors->first('number_phone') }}</span>
										@endif
									</td>
								</tr>
							</tbody>
						</table>
						<input type="submit" class="btn btn-success btn-ukuran" value="Simpan">
					</form>
				</div>
			</div>
		</div>

		<!-- Modal Email -->
		<div class="modal fade" id="myModalEmail" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Permohonan Ubah Email</h4>
					</div>
					<form action="/profile/edit/email/{{ $user->id }}" method="POST">
						{{ csrf_field() }}
						<div class="modal-body">
							<div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
								<label>Email Lama</label>
								<input type="email" id="email_lama" name="email_lama" class="form-control" value="{{ Request::old('email') ?: Auth::user()->email }}" readonly>

								@if($errors->has('email'))
					    			<span class="help-block" style="color:red;">{{ $errors->first('email') }}</span>
					    		@endif
							</div>
							<div class="form-group">
								<label>Email Baru</label>
								<input type="email" id="email_baru" name="email_baru" class="form-control" required>
							</div>
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label>Password</label>
								<input type="password" id="password" name="password" class="form-control">
								@if ($errors->has('password'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>
							<input type="submit" class="btn btn-success btn-ukuran" value="Simpan">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal Nomor HP -->
		<div class="modal fade" id="myModalNoHP" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Permohonan Ubah Nomor HP</h4>
					</div>
					<form action="/profile/edit/nohp/{{ $user->id }}" method="POST">
						{{ csrf_field() }}
						<div class="modal-body">
							<div class="form-group">
								<label>Nomor HP Baru</label>
								<input type="text" id="nomor_baru" name="nomor_baru" class="form-control">

								@if ($errors->has('nomor_baru'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('nomor_baru') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label>Password</label>
								<input type="password" id="password" name="password" class="form-control">

								@if ($errors->has('password'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>
							<input type="submit" class="btn btn-success btn-ukuran" value="Simpan">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<!-- Modal Foto Profile -->
		<div class="modal fade" id="myModalFotoProfile" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Permohonan Ubah Foto Profile</h4>
					</div>
					<form action="/profile/edit/foto/{{ $user->id }}" method="POST" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="modal-body">
							<div class="form-group">
								<label>Foto Prfile</label>
								<input type="file" id="foto_profile" name="foto_profile">
							</div>

							@if ($errors->has('foto_profile'))
                                <span class="help-block" style="color:red;">
                                    <strong>{{ $errors->first('foto_profile') }}</strong>
                                </span>
                            @endif
							
							<input type="submit" class="btn btn-success btn-ukuran" value="Upload">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal Ubah Kata Sandi -->
		<div class="modal fade" id="myModalKataSandi" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Permohonan Ubah Kata Sandi</h4>
					</div>
					<form action="/profile/edit/password/{{ $user->id }}" method="POST">
						{{ csrf_field() }}
						<div class="modal-body">
							<div class="form-group">
								<label>Kata Sandi Lama</label>
								<input type="password" id="kata_sandi_lama" name="kata_sandi_lama" class="form-control">

								@if ($errors->has('kata_sandi_lama'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('kata_sandi_lama') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group">
								<label>Kata Sandi Baru</label>
								<input type="password" id="kata_sandi_baru" name="kata_sandi_baru" class="form-control">

								@if ($errors->has('kata_sandi_baru'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('kata_sandi_baru') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="form-group">
								<label>Ulang Kata Sandi Baru</label>
								<input type="password" id="ulang_kata_sandi" name="ulang_kata_sandi" class="form-control">

								@if ($errors->has('ulang_kata_sandi'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('ulang_kata_sandi') }}</strong>
                                    </span>
                                @endif
							</div>
							<input type="submit"class="btn btn-success btn-ukuran" value="Simpan">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="jarak_atas"></div>
@endsection