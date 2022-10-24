@extends('layouts.admin')

@section('admin-content')
    @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" style="font-weight: 400;">
                <i class="fas fa-times"></i>
            </button>
        </div>
    @endif

    @if (Auth::user()->role == 'admin')
    <a href="/master-siswa/create" class="btn bg-gradient-primary btn-primary mb-2">Tambah Siswa</a>
    @endif

	<div class="card mb-4" style="border: 1px solid #bbb;">
        <div style="color: white; font-weight: 500;" class="card-header bg-gradient-success">
            <i class="fas fa-user me-1" style="margin-right: 5px;"></i>
            Data Siswa
        </div>
        <div class="card-body">
       		<table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NISN</th>    
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Action</th>
                    </tr>
                </thead/>

                <tbody>
                    @foreach($siswa as $s)
                    <tr>
                       	<td> {{ $n++ }} </td>
                        <td> {{ $s->nisn }} </td>
                       	<td> {{ $s->nama }} </td>
                      	<td> {{ $s->alamat }} </td>
                       	<td> {{ $s->jk }} </td>
                        <td>
                        	<div class="row" style="justify-content: center; position: relative;">
                                @if (Auth::user()->role == 'admin')
                                <form>
                                    <a class="btn-btn" href="{{ route('master-siswa.show', $s->id)}}" style="text-decoration: none;">
                                        <span class="bt bg-gradient-primary">
                                            <i class="tn fas fa-eye"></i>
                                        </span>
                                    </a>
                                </form>
                                <form>
                                    <a class="btn-btn" href="{{ route('master-siswa.edit', $s->id)}}" style="text-decoration: none;">
                                        <span class="bt bg-gradient-warning">
                                           <i class="tn far fa-edit"></i>
                                        </span>
                                    </a>
                                </form>
                                <form>
                                    <a class="btn-btn" href="{{ route('master-siswa.hapus', $s->id)}}" style="text-decoration: none;" onclick="return confirm('Kamu yakin??')">
                                        <span class="bt bg-gradient-danger">
                                           <i class="tn far fa-trash-alt"></i>
                                        </span>
                                    </a>
                                </form>
                                @endif
                                @if (Auth::user()->role == 'walas')
                                <form>
                                    <a class="btn bg-gradient-primary text-white" href="{{ route('master-siswa.show', $s->id)}}" style="text-decoration: none;">
                                        Lihat
                                    </a>
                                </form>
                                @endif
        					</div>
                        </td>
          	        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection