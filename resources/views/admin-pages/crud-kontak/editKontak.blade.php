@extends('layouts.admin')

@section('admin-content')

  <div class="card mb-4" style="border: 1px solid #bbb;">
        <div style="font-weight: 500;" class="card-header bg-gradient-warning text-white">
            <i class="fas fa-book me-1" style="margin-right: 5px;"></i>
            Edit Kontak
        </div>
        <div class="card-body">
          <form method="post" enctype="multipart/form-data" action="{{ url('/master-kontak/'.$kons->id ) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
	       		<label for="jenis_kontak_id">Jenis Kontak</label>
	       		<select name="jenis_kontak_id" id="jenis_kontak_id" class="form-control" required style="padding: 0.375rem 0.5rem;" value="">
	                <option value="Pilih" selected disabled>Pilih Kontak</option>
	                @foreach ($jk as $k)
	                    <option class="text-dark" value="{{ $k->id }}" {{ $k->id == $kons->jenis_kontak_id ? 'selected' : '' }}>{{ $k->jenis_kontak }}</option>
	                @endforeach
	            </select>
	       	</div>

            <div class="form-group">
       			<label for="deskripsi">Deskripsi</label>
       			<input class="form-control" name="deskripsi" id="deskripsi" required value="{{ $kons->deskripsi }}">
   			</div>

            <div class="form-group">
              <button type="submit" class="btn bg-gradient-success text-white">Perbarui</button>
              <a href="/master-kontak" class="btn bg-gradient-danger text-white">Batal</a>
            </div>

          </form>
        </div>
    </div>

@endsection