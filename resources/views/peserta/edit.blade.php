@extends('layouts.skeleton')
@section('title','Edit Data Peserta')

@section('content')
	<div class="w-100 d-flex align-items-center">
		<a href="{{route('peserta.index')}}" class="btn btn-danger">
			<i class="fas fa-arrow-left"></i> Back
		</a>
		<b class="ml-auto mr-auto">Edit Data Peserta</b>
		<a href="{{ route('peserta.exportToWord', $peserta->id) }}" class="btn btn-primary">
			<i class="fas fa-file-word"></i> Export to Word
		</a>
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

	<form method="POST" action="{{ route('peserta.update', $peserta->id) }}" id="create">
		@csrf
		@method('PUT')
		<div class="form-group">
			<label>Nama</label>
			<input type="text" name="nama" class="form-control" value="{{ $peserta->nama }}">
		</div>
		<div class="form-group">
			<label>Alamat Email</label>
			<input type="email" name="alamat_email" class="form-control" value="{{ $peserta->alamat_email }}">
		</div>
		<div class="form-group">
			<label>Nomor Telp</label>
			<input type="tel" name="nomor_telp" class="form-control"  value="{{ $peserta->nomor_telp }}">
		</div>
		<div class="form-group">
			<label>Alamat</label>
			<textarea class="form-control" name="alamat">{{ trim($peserta->alamat) }}</textarea>
		</div>
		<div class="form-group text-right">
			<button class="btn btn-primary" onclick="$('#create').submit()">
				<i class="fas fa-save"></i> Update
			</button>
		</div>
		@csrf
	</form>
@endsection