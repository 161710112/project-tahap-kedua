@extends('layouts.admin')
@section('content')

	<div class="row">
	<div class="container">
	<div class="col-md-16">
			<div class="panel panel-danger">
			  <div class="panel-heading"><font color ="blue">Data perusahaan </font>
			  	<div class="panel-title pull-right"><a href="{{ route('perusahaan.create') }}">Tambah</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<div class="table-responsive">
				  <table class="table">
				  	<thead>
			  		<tr>
			  		  <th>No</th>
					  <th>Logo</th>
					  <th>Deskripsi</th>
					  <th>Kategori</th>
					  <th>Subkategori</th>
					  <th>Judul</th>
					  <th>Gaji</th>
					  <th>Tanggal Mulai</th>
					  <th>Email</th>
					  <th>Telepon</th>
					  <th>Name</th>
					  <th colspan="3">Action</th>
			  		</tr>
				  	</thead>
				  	<tbody>
				  		<?php $nomor = 1; ?>
				  		@php $no = 1; @endphp
				  		@foreach($p as $data)
				  	  <tr>
				    	<td>{{ $no++ }}</td>
				    	<td>{{ $data->logo }}</td>
				    	<td>{{ $data->deskripsi }}</td>
				    	<td>{{ $data->kategori }}</td>
				    	<td>{{ $data->subkategori }}</td>
				    	<td>{{ $data->judul }}</td>
				    	<td>{{ $data->gaji }}</td>
				    	<td>{{ $data->tgl_mulai }}</td>
				    	<td>{{ $data->email }}</td>
				    	<td>{{ $data->telepon }}</td>
				    	<td><p>{{ $data->User->name }}</p></td>
<td>
	<a class="btn btn-warning" href="{{ route('perusahaan.edit',$data->id) }}">Edit</a>
</td>
<td>
	<a href="{{ route('perusahaan.show',$data->id) }}" class="btn btn-success">Show</a>
</td>
<td>
	<form method="post" action="{{ route('perusahaan.destroy',$data->id) }}">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">

		<button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</button>
	</form>
</td>
				      </tr>
				      @endforeach	
				  	</tbody>
				  </table>
				</div>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection