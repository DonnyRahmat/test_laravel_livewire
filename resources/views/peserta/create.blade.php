@extends('layouts.skeleton')
@section('title','Input Peserta')

@section('content')
	<div class="w-100 d-flex align-items-center">
		<a href="{{route('peserta.index')}}" class="btn btn-danger position-absolute">
			<i class="fas fa-arrow-left"></i> Back
		</a>
		<b class="ml-auto mr-auto">Input Peserta</b>
	</div>
	
	<br>

	@if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	    <br>
	@endif

	<form method="POST" action="{{ Route('peserta.store') }}" id="create">
		<div class="form-group">
			<label>Nama</label>
			<input type="text" name="nama" class="form-control">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="email" name="alamat_email" class="form-control">
		</div>
		<div class="form-group">
			<label>Nomor Telp</label>
			<input type="tel" name="nomor_telp" class="form-control" >
		</div>
		<div class="form-group">
			<label>Alamat</label>
			<textarea class="form-control" name="alamat"></textarea>
		</div>
		<div class="form-group text-right">
			<button class="btn btn-primary" onclick="$('#create').submit()">
				<i class="fas fa-save"></i> Save
			</button>
		</div>
		@csrf
	</form>
@endsection