@extends('layouts.admin')

@section('admin-content')

  <div class="card mb-4" style="border: 1px solid #bbb;">
        <div style="font-weight: 500;" class="card-header bg-gradient-warning text-white">
            <i class="fas fa-book me-1" style="margin-right: 5px;"></i>
            Edit Project
        </div>
        <div class="card-body">
          <form method="post" enctype="multipart/form-data" action="{{ url('/master-project/'.$projek->id ) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="nama_projek">Nama Project</label>
              <input type="text" class="form-control mb-1" id="nama_projek" name='nama_projek' value="{{ $projek->nama_projek }}">
            </div>

            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control mb-1" id="deskripsi" name='deskripsi'>{{ $projek->deskripsi }}</textarea>
            </div>

            <div class="form-group">
              <button type="submit" class="btn bg-gradient-success text-white">Perbarui</button>
              <a href="/master-project" class="btn bg-gradient-danger text-white">Batal</a>
            </div>

          </form>
        </div>
    </div>

@endsection