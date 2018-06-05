@extends('layouts.app')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Show Data Lowongan 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Lowongan</label>	
			  			<input type="text" name="nama_low" class="form-control" value="{{ $l->nama_low }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Tanggal Mulai</label>
						<input type="date" name="tgl_mulai" class="form-control" value="{{ $l->tgl_mulai }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Lokasi</label>
						<input type="text" name="lokasi" class="form-control" value="{{ $l->lokasi }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Gaji</label>
						<input type="text" name="gaji" class="form-control" value="{{ $l->gaji }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Deskripsi</label>
						<input type="date" name="deskripsi" class="form-control" value="{{ $l->deskripsi }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Perusahaan</label>
						<input type="text" name="pers_id" class="form-control" value="{{ $l->Perusahaan->deskripsi }}"  readonly>
			  		
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection 