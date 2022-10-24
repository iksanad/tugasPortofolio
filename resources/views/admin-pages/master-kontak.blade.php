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
    
	<div class="row">
		<div class="col-lg-7">
			<div class="card shadow mb-4" style="border: 1px solid #bbb;">
		        <div style="font-weight: 500;" class="card-header text-dark">
			        <i class="fas fa-user me-1" style="margin-right: 5px;"></i>
			        Data Siswa
			    </div>
			    <div class="card-body">
					<table class="table table-bordered display nowrap" cellspacing="0" width="100%" border="2">
					    <thead>
					        <tr>
					        	<th>NISN</th>
					            <th>Nama</th>
					            <th>Action</th>
					        </tr>
					    </thead>
					    <tbody>
					    	@foreach($siswa as $s)
					        <tr>
					        	<td>{{ $s->nisn }}</td>
					            <td>{{ $s->nama }}</td>
					            <td>
					            	<div class="row" style="position: relative; padding: 0 .75rem;">
		                                <form>
		                                    <a class="btn-btn" onclick="show({{ $s->id }})" style="text-decoration: none;">
		                                        <span class="bt bg-gradient-primary" style="border-radius: 3px;">
		                                            <i class="tn fas fa-folder-open"></i>
		                                        </span>
		                                    </a>
		                                </form>
		                                @if (Auth::user()->role == 'admin')
		                                <form>
		            	                   	<a class="btn-btn ml-1" onclick="create({{ $s->id }})" style="text-decoration: none;">
		            				            <span class="bt bg-gradient-success" style="border-radius: 3px;">
		            				        	   <i class="tn fas fa-plus"></i>
		            					  	    </span>
		            						</a>
		                                </form>
		                                @endif
		        					</div>
					            </td>
					        </tr>
					        @endforeach
					    </tbody>
					</table>
					<div class="d-flex justify-content-end">{{ $siswa->links() }}</div>
			    </div>
		    </div>
		    @if (Session::has('errors'))
		    	<div class="alert alert-danger">
		    		<div class="mb-3">
		    			<b class="row" style="justify-content: space-between;">
		    				<p class="text-center mb-0 ml-2">Data gagal ditambahkan!</p>
				    		<button type="button" class="close" data-dismiss="alert" style="font-weight: 400; margin-right: 0.5rem;">
				    			<i class="fas fa-times"></i>
				    		</button>
				    	</b>
		    		</div>
		    		
		            <ul  style="padding-inline-start: 20px;">
		            	@foreach ($errors->all() as $error)
		            		<li class="text-danger">{{ $error }}</li>
		            	@endforeach
		            </ul>
		        </div>
		    @endif
		</div>

		<div class="col-lg-5">
			<div class="card shadow mb-4" style="border: 1px solid #bbb;">
		        <div style="font-weight: 500;" class="card-header text-dark">
			        <i class="fas fa-fw fa-address-card" style="margin-right: 5px;"></i>
			        Kontak Siswa
			    </div>
			    <div class="card-body" id="tampilkan">
					<h6 class="text-center">Pilih siswa terlebih dahulu</h6>
			    </div>
		    </div>

		    <div class="card shadow mb-4" style="border: 1px solid #999;">
					<div style="font-weight: 500;" class="card-header text-dark">
				        <i class="fas fa-fw fa-address-card me-1" style="margin-right: 5px;"></i>
				        Jenis Kontak
				    </div>
				    <div class="card-body">
				    	
				    	@if (Auth::user()->role == 'admin')
		                <button type="button" class="btn bg-gradient-primary text-white" data-bs-toggle="modal" data-bs-target="#jk">
							Tambah Jenis Kontak
						</button>

						<div class="modal fade" id="jk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" style="margin-top: 180px;">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h3 class="modal-title fs-5" id="exampleModalLabel">Tambah Jenis Kontak</h3>
						        <button type="button" class="btn btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close">
						        	<i class="fas fa-times"></i>
						        </button>
						      </div>
						      <form action="{{ route('master-kontak.tambah') }}" method="post">
						      	@method('POST')
						      	@csrf
						      <div class="modal-body">
						      	<span>Jenis Kontak</span>
						        <input type="text" class="form-control mt-1 py-3" name="jenis_kontak" placeholder="WhatsApp" style="font-size: 13px;" required>
						      </div>
						      <div class="modal-footer py-2">
						        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
						        <button type="submit" class="btn btn-primary">Tambah</button>
						      </div>
						  	  </form>
						    </div>
						  </div>
						</div>
						@endif

						<table class="table table-bordered display nowrap mt-2" cellspacing="0" width="100%" border="2">
						    <thead>
						        <tr style="background: #bbb;">
						        	<th style="color: #333;">Jenis Kontak</th>
						        	@if (Auth::user()->role == 'admin')
						            <th style="color: #333;">Action</th>
						            @endif
						        </tr>
						    </thead>
						    <tbody>
						    	@foreach($jk as $s)
						        <tr>
						        	<td>{{ $s->jenis_kontak }}</td>
						        	@if (Auth::user()->role == 'admin')
						        	<td>
						            	<div class="row" style="position: relative; padding: 0 .75rem;">
			                                <form method="post">
									        	@method('delete')
									        	@csrf
										        <a class="btn-btn" href="{{ route('master-kontak.hapus', $s->id)}}" style="text-decoration: none;" onclick="return confirm('Kamu yakin??')">
			                                        <span class="bt bg-gradient-danger" style="border-radius: 3px;">
			                                           <i class="tn far fa-trash-alt"></i>
			                                        </span>
			                                    </a>
										    </form>
			        					</div>
						            </td>
						            @endif
						        </tr>
						        @endforeach
						    </tbody>
						</table>
						<div class="d-flex justify-content-end">{{ $siswa->links() }}</div>
				    </div>
			</div>
		</div>

	</div>

	<script>
		function show(id) {
			$.get('master-kontak/'+id, function(data){
				$('#tampilkan').html(data);
			});
		}

		function create(id) {
			$.get('master-kontak/create/'+id, function(data){
				$('#tampilkan').html(data);
			});
		}

		
	</script>

@endsection