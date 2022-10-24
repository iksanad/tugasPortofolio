@if ($project->isEmpty())
		<h6 class="text-center">Siswa belum memiliki Project</h6>
	@else
	@foreach ($project as $p)
		<div class="card mb-3" style="box-shadow: none; border-radius: 0; border: 1px solid #aaa">
			
				<div class="card-header text-center" style="border-radius: 0;">
					<b>{{ $p->nama_projek }}</b>
			        
				</div>
				<div class="card-body">
					<p><b style="margin-right: 5px;">Tanggal : </b>{{ $p->tanggal }}</p>
					<b>Deskripsi Project :</b><p>{{ $p->deskripsi }}</p>
				</div>

				@if (Auth::user()->role == 'admin')
				<div class="card-footer" style="display: flex; flex-direction: row; justify-content: flex-end;">
					<form>
		            	<a class="btn-btn" href="master-project/ubah/{{ $p->id }}" style="text-decoration: none;">
		            		<span class="bt bg-gradient-warning" style="border-radius: 3px;">
		            			<i class="tn fas fa-edit"></i>
		            		</span>
		            	</a>
		            </form>
			        <form action="/master-project/{{ $p->id }}" method="post">
			        	@method('delete')
			        	@csrf
				        <button class="bt bg-gradient-danger ml-1" onclick="return confirm('Kamu yakin??')" style="border-radius: 3px;">
				       		<i class="tn far fa-trash-alt"></i>
				        </button>
				    </form>
				</div>
				@endif
		</div>
	@endforeach
	
@endif