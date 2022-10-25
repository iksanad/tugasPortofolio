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
		<div class="col-lg-5">
			<div class="card shadow mb-4" style="border: 1px solid #bbb;">
		        <div style="font-weight: 500;" class="card-header bg-gradient-warning text-white">
			        <i class="fas fa-user me-1" style="margin-right: 5px;"></i>
			        Data Siswa
			    </div>
			    <div class="card-body">
			    	<div class="table-responsive">
						<table class="table table-hover">
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
						            	<div class="row" style="justify-content: center; position: relative;">
			                                <form class="mb-1">
			                                    <a class="btn-btn" onclick="show({{ $s->id }})" style="text-decoration: none;">
			                                        <span class="bt bg-gradient-primary" style="border-radius: 3px;">
			                                            <i class="tn fas fa-folder-open"></i>
			                                        </span>
			                                    </a>
			                                </form>
			                                @if (Auth::user()->role == 'admin')
			                                <form class="mb-1">
			            	                   	<a class="btn-btn" onclick="create({{ $s->id }})" style="text-decoration: none;">
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
					</div>
					<div class="d-flex justify-content-end">{{ $siswa->links() }}</div>
			    </div>
		    </div>
		</div>

		<div class="col-lg-7">
			<div class="card shadow mb-4" style="border: 1px solid #bbb;">
		        <div style="font-weight: 500;" class="card-header bg-gradient-primary text-white">
			        <i class="fas fa-book me-1" style="margin-right: 5px;"></i>
			        Project Siswa
			    </div>
			    <div class="card-body" id="project">
					<h6 class="text-center">Pilih siswa terlebih dahulu</h6>
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
		            		<li class="text-danger">{{ $error}}</li>
		            	@endforeach
		            </ul>
		        </div>
		    @endif
		</div>

	</div>

	<script>
		function show(id) {
			$.get('master-project/'+id, function(data){
				$('#project').html(data);
			});
		}

		function create(id) {
			$.get('master-project/tambah/'+id, function(data){
				$('#project').html(data);
			});
		}
	</script>

@endsection