@if ($kons->isEmpty())
		<h6 class="text-center text-danger"><b>Siswa belum memiliki Kontak</b></h6>
	@else
	@foreach ($kons as $p)
		<div class="card mb-3" style="box-shadow: none; border-radius: 0; border: 1px solid #aaa; background: #ddd;">
			
				<!-- <div class="card-header text-center" style="border-radius: 0;">
					<b></b>
				</div> -->
				<div class="card-body row" style="padding: 0.75rem 1.25rem;">
					<p class="text-center mb-0 ml-2">{{ $p->jenis->jenis_kontak }}</p>
					<p class="mb-0 ml-2"> : </p>
					<p class="text-center mb-0 ml-2"><b>{{ $p->deskripsi }}</b></p>
				</div>
				
				@if (Auth::user()->role == 'admin')
				<div class="card-footer" style="display: flex; flex-direction: row; justify-content: flex-end; padding: 0.5rem; border-radius: 0;">
					<form>
		            	<a class="btn-btn" href="master-kontak/ubah/{{ $p->id }}" style="text-decoration: none;">
		            		<span class="bt bg-gradient-warning" style="border-radius: 3px;">
		            			<i class="tn fas fa-edit"></i>
		            		</span>
		            	</a>
		            </form>
			        <form action="/master-kontak/{{ $p->id }}" method="post">
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