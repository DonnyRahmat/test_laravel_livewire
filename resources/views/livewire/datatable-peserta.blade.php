	<div>
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-6">
						<b>Peserta</b>
					</div>
					<div class="col-md-6">
						<input type="text" name="" class="form-control" wire:model="searchByName" placeholder="Nama ...">
					</div>
				</div>
			</div>
			<div class="col-md-6 text-right">
				<a class="btn btn-primary" href="{{ route('peserta.create') }}">
					+ Add Peserta
				</a>
			</div>
		</div>
		<br>
		<table class="table table-bordered">
	   		<thead>
	   			<tr>
	   				<th>Nama</th>
	   				<th>Email</th>
	   				<th>Nomor Telp</th>
	   				<th>Alamat</th>
	   				<th>Action</th>
	   			</tr>
	   		</thead>
	   		<tbody>
			    @foreach($data as $key => $value)
			   		<tr wire:key="row-{{$key}}">
			   			<td>{{$value->nama}}</td>
			   			<td>{{$value->alamat_email}}</td>
			   			<td>{{$value->nomor_telp}}</td>
			   			<td>{{$value->alamat}}</td>
			   			<td>
			   				<div class="row">
			   					<div class="col-md-6">
					   				<a href="{{route('peserta.edit',$value->id)}}">
					   					<i class="fas fa-edit"></i>
					   				</a>
			   					</div>
			   					<div class="col-md-6">
					   				<a href="" wire:click.prevent="confirmationDelete({{ $value->id }})">
					   					<i class="fas fa-trash" style="color: red;"></i>
					   				</a>
			   					</div>
			   				</div>
			   			</td>
			   		</tr>
			    @endforeach
	   		</tbody>
	   	</table>
	   	{{ $data->links() }}

		<!-- begin:: Modal delete -->
	    <div class="modal fade" id="confirmationDeleteModal" tabindex="-1" role="dialog">
	        <div class="modal-dialog modal-dialog-centered" role="document">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h5 class="modal-title" id="modalLabel">Delete Data Peserta</h5>
	                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                        <span aria-hidden="true">×</span>
	                    </button>
	                </div>
	                <div class="modal-body">
	                    <p>
	                        Are you sure?
	                    </p>
	                </div>
	                <div class="modal-footer">
	                    <button class="btn btn-secondary" data-dismiss="modal" aria-label="Close">
	                        <i class="fas fa-times"></i> No
	                    </button>
	                    <button class="btn btn-danger" wire:click.prevent="deletePeserta">
	                        <i class="fas fa-check"></i> Yes
	                    </button>
	                </div>
	            </div>
	        </div>
	    </div>
	    <!-- end:: Modal delete -->
	</div>

