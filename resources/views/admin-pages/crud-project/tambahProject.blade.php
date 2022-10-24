<div class="card" style="box-shadow: none; border-radius: 0;">
	<div class="card-header" style="background: #ddd; border-radius: 0;">
		Tambah Project : <b>{{ $siswa->nama }}</b>

	</div>
	<form method="post" action="{{ route('master-project.store') }}" enctype="multipart/form-data">
		<div class="card-body">
		
        @csrf
          	<input type="hidden" id="siswa_id" name='siswa_id' value="{{ $siswa->id }}">

   			<div class="form-group">
       		<label for="nama_projek">Nama Projek</label>
       		<input type="text" class="form-control mb-1 @error('nama_projek') is-invalid @enderror" id="nama_projek" name='nama_projek'>
       	</div>
       		
       	<div class="form-group">
       		<label for="deskripsi">Deskripsi</label>
       		<textarea class="form-control mb-1 @error('deskripsi') is-invalid @enderror" id="deskripsi" name='deskripsi'></textarea>
   			</div>
       	
		</div>
		<div class="card-footer" style="display: flex; flex-direction: row; justify-content: flex-end;">
			<button type="submit" class="btn bg-gradient-success text-white">Tambah Project</button>
		</div>
	</form>
</div>