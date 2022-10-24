@extends('layouts.admin')

@section('admin-content')

	<div class="card mb-4" style="border: 1px solid #bbb;">
        <div style="font-weight: 500;" class="card-header bg-gradient-primary text-white">
            <i class="fas fa-user me-1" style="margin-right: 5px;"></i>
            Tambah Data Siswa
        </div>
        <div class="card-body">
       		<form method="post" action="{{ route('master-siswa.store') }}" enctype="multipart/form-data">
            @csrf

       			<div class="form-group">
       				<label for="nama">Nama</label>
       				<input type="text" class="form-control mb-1 @error('nama') is-invalid @enderror" id="nama" name='nama'>
              @error('nama')
                <div class="alert alert-danger" style="padding: 0.35rem 0.75rem;">
                  {{ $message }}
                </div>
              @enderror
       			</div>

       			<div class="form-group">
       				<label for="nisn">NISN</label>
       				<input type="text" class="form-control mb-1 @error('nisn') is-invalid @enderror" id="nisn" name='nisn'>
              @error('nisn')
                <div class="alert alert-danger" style="padding: 0.35rem 0.75rem;">
                  {{ $message }}
                </div>
              @enderror
       			</div>

       			<div class="form-group">
       				<label for="alamat">Alamat</label>
       				<input type="text" class="form-control mb-1 @error('alamat') is-invalid @enderror" id="alamat" name='alamat'>
              @error('alamat')
                <div class="alert alert-danger" style="padding: 0.35rem 0.75rem;">
                  {{ $message }}
                </div>
              @enderror
       			</div>

       			<div class="form-group">
       				<label for="jk">Jenis Kelamin</label>
       				<select class="form-select form-control mb-1 @error('jk') is-invalid @enderror" id="jk" name="jk">
                <option value="Pilih" selected="select" disabled>Pilih</option>
       					<option value="Laki-laki">Laki-laki</option>
       					<option value="Perempuan">Perempuan</option>
       				</select>
              @error('jk')
                <div class="alert alert-danger" style="padding: 0.35rem 0.75rem;">
                  {{ $message }}
                </div>
              @enderror
       			</div>

       			<div class="form-group">
       				<label for="foto">Foto Siswa</label>
       				<input type="file" class="form-control-file mb-1 @error('foto') is-invalid @enderror" id="foto" name='foto'>
              @error('foto')
                <div class="alert alert-danger" style="padding: 0.35rem 0.75rem;">
                  {{ $message }}
                </div>
              @enderror
       			</div>

       			<div class="form-group">
       				<label for="about">About</label>
       				<textarea class="form-control mb-1 @error('about') is-invalid @enderror" id="about" name='about'></textarea>
              @error('about')
                <div class="alert alert-danger" style="padding: 0.35rem 0.75rem;">
                  {{ $message }}
                </div>
              @enderror
       			</div>

       			<div class="form-group">
       				<input type="submit" class="btn bg-gradient-success text-white" value="Simpan">
       				<a href="/master-siswa" class="btn bg-gradient-danger text-white">Batal</a>
       			</div>
            
       		</form>
        </div>
    </div>

@endsection