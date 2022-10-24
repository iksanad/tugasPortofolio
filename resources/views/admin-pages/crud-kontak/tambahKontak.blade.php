<div class="card" style="box-shadow: none; border-radius: 0;">
	<div class="card-header" style="background: #ddd; border-radius: 0;">
		Tambah Kontak : <b>{{ $siswa->nama }}</b>

	</div>
	<form method="post" action="{{ route('master-kontak.store') }}" enctype="multipart/form-data">
		<div class="card-body">
		
        @csrf
          	<input type="hidden" id="siswa_id" name='siswa_id' value="{{ $siswa->id }}">

   			<div class="form-group">
       		<label for="jenis_kontak_id">Jenis Kontak</label>
       		<select name="jenis_kontak_id" id="jenis_kontak_id" class="form-control" required style="padding: 0.375rem 0.5rem;">
                <option value="Pilih" disabled selected="selected">Pilih Kontak</option>
                @foreach ($jk as $k)
                    <option class="text-dark" value="{{ $k->id }}">{{ $k->jenis_kontak }}</option>
                @endforeach
            </select>
       	</div>
       		
       	<div class="form-group">
       		<label for="deskripsi">Deskripsi</label>
       		<input class="form-control" name="deskripsi" id="deskripsi" required>
   		</div>
       	
		</div>
		<div class="card-footer" style="display: flex; flex-direction: row; justify-content: flex-end;">
			<button type="submit" class="btn bg-gradient-success text-white">Tambah Kontak</button>
		</div>
	</form>
</div>