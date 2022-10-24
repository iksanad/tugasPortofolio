@extends('layouts.admin')

@section('admin-content')

	<div class="card mb-4" style="border: 1px solid #bbb;">
        <div style="font-weight: 500;" class="card-header bg-gradient-warning text-white">
            <i class="fas fa-user me-1" style="margin-right: 5px;"></i>
            Edit Data Siswa
        </div>
        <div class="card-body">
       		<form method="post" enctype="multipart/form-data" action="{{ url('/master-siswa/'.$siswa->id ) }}">
            @csrf
            @method('PUT')
       			<div class="form-group">
       				<label for="nama">Nama</label>
       				<input type="text" class="form-control mb-1 @error('nama') is-invalid @enderror" id="nama" name='nama' value="{{ $siswa->nama }}">
              @error('nama')
                <div class="alert alert-danger" style="padding: 0.35rem 0.75rem;">
                  {{ $message }}
                </div>
              @enderror
       			</div>

       			<div class="form-group">
       				<label for="nisn">NISN</label>
       				<input type="text" class="form-control mb-1 @error('nisn') is-invalid @enderror" id="nisn" name='nisn' value="{{ $siswa->nisn }}">
              @error('nisn')
                <div class="alert alert-danger" style="padding: 0.35rem 0.75rem;">
                  {{ $message }}
                </div>
              @enderror
       			</div>

       			<div class="form-group">
       				<label for="alamat">Alamat</label>
       				<input type="text" class="form-control mb-1 @error('alamat') is-invalid @enderror" id="alamat" name='alamat' value="{{ $siswa->alamat }}">
              @error('alamat')
                <div class="alert alert-danger" style="padding: 0.35rem 0.75rem;">
                  {{ $message }}
                </div>
              @enderror
       			</div>

       			<div class="form-group">
       				<label for="jk">Jenis Kelamin</label>
       				<select class="form-select form-control mb-1 @error('jk') is-invalid @enderror" id="jk" name="jk">
                <option value="Pilih" disabled selected>Pilih</option>
       					<option value="Laki-laki" @if($siswa->jk == 'Laki-laki') selected @endif>Laki-laki</option>
       					<option value="Perempuan" @if($siswa->jk == 'Perempuan') selected @endif>Perempuan</option>
       				</select>
              @error('jk')
                <div class="alert alert-danger" style="padding: 0.35rem 0.75rem;">
                  {{ $message }}
                </div>
              @enderror
       			</div>

       			<div class="form-group">
       				<label for="foto">Foto Siswa</label><br>
              <img src="{{ asset('/template/img/'.$siswa->foto) }}" width="300" class="img-thumbnail"><br>
       				<input type="file" class="form-control-file mb-1 @error('foto') is-invalid @enderror" id="foto" name="foto" value="{{ $siswa->foto }}">
              @error('foto')
                <div class="alert alert-danger" style="padding: 0.35rem 0.75rem;">
                  {{ $message }}
                </div>
              @enderror
       			</div>

       			<div class="form-group">
       				<label for="about">About</label>
       				<textarea class="form-control mb-1 @error('foto') is-invalid @enderror" id="about" id="about" name='about'>{{ $siswa->about }}</textarea>
              @error('about')
                <div class="alert alert-danger" style="padding: 0.35rem 0.75rem;">
                  {{ $message }}
                </div>
              @enderror
       			</div>

       			<div class="form-group">
       				<button type="submit" class="btn bg-gradient-success text-white">Perbarui</button>
       				<a href="/master-siswa" class="btn bg-gradient-danger text-white">Batal</a>
       			</div>

       		</form>
        </div>
    </div>

@endsection