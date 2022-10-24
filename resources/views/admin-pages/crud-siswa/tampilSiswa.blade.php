@extends('layouts.admin')

@section('admin-content')

	<div class="d-flex mb-2" style="justify-content: flex-end;">
		<a href="/master-siswa" class="btn bg-gradient-success text-white">Kembali</a>
	</div>

	<div class="row">

		<div class="col-lg-4">
			<div class="card shadow mb-4" style="border: 1px solid #bbb;">
		        <div style="font-weight: 500;" class="card-header bg-gradient-danger text-white">
			        <i class="fas fa-id-card me-1" style="margin-right: 5px;"></i>
			        Profil Siswa
			    </div>
			    <div class="card-body">
					<section class="text-center">
					    <img src="{{ asset('/template/img/'.$siswa->foto) }}" alt="pic" width="200" class="mb-3 rounded-circle img-thumbnail">
					    <h3>{{ $siswa->nama }}</h3>
					</section>
			    </div>
		    </div>
		    <div class="card shadow mb-4" style="border: 1px solid #bbb;">
		        <div style="font-weight: 500;" class="card-header bg-gradient-warning text-white">
			        <i class="fas fa-user-plus me-1" style="margin-right: 5px;"></i>
			        Kontak Siswa
			    </div>
			    <div class="card-body" style="padding: 0 1.25rem;">
			    	<ul class="list-group list-group-flush">
				    @foreach ($kontaks as $cons)
				    	<li class="list-group-item" style="padding: 0.75rem 1rem;">{{ $cons->jenis_kontak }} : {{ $cons->pivot->deskripsi }}</li>
					@endforeach
					</ul>
			    </div>
		    </div>
		</div>
				
		<div class="col-lg-8">
	    	<div class="card shadow mb-4" style="border: 1px solid #bbb;">
			    <div style="font-weight: 500;" class="card-header bg-gradient-info text-white">
			        <i class="fas fa-quote-left me-1" style="margin-right: 5px;"></i>
		            Tentang Siswa
		        </div>
		        <div class="card-body" style="padding: 0 1.25rem;">
			       	<ul class="list-group list-group-flush">
			       		<li class="list-group-item" style="padding: 0.75rem 1rem;">{{ $siswa->nisn }}</li>
			       		<li class="list-group-item" style="padding: 0.75rem 1rem;">{{ $siswa->alamat }}</li>
			       		<li class="list-group-item" style="padding: 0.75rem 1rem;">{{ $siswa->jk }}</li>
			       	</ul>
			    </div>
		    </div>
		    <div class="card shadow mb-4" style="border: 1px solid #bbb;">
			    <div style="font-weight: 500;" class="card-header bg-gradient-dark text-white">
			        <i class="fas fa-quote-left me-1" style="margin-right: 5px;"></i>
		            Pesan Siswa
		        </div>
		        <div class="card-body">
		        	<blockquote class="text-center mb-0">
		        		<p class="mb-0 blockquote">{{ $siswa->about }}</p>
			       		<footer clas="blockquote-footer">~ <cite title="Source title">{{ $siswa->nama }}</cite> ~</footer>
		        	</blockquote>
			    </div>
		    </div>
		    <div class="card shadow mb-4" style="border: 1px solid #bbb;">
			    <div style="font-weight: 500;" class="card-header bg-gradient-success text-white">
			        <i class="fas fa-tasks me-1" style="margin-right: 5px;"></i>
		            Project Siswa
		        </div>
		        <div class="card-body">
			       		
			    </div>
		    </div>
	    </div>
	</div>

@endsection