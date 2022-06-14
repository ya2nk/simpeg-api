@extends('layouts.main')

@section('content')
<span x-data="data"/>
	<x-page-title title="Master Eselon"/>
	<section class="section">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title">Datatables</h5>
						<div class="table-responsive">
							<table id="datatable" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Nama</th>
										<th>Jabatan ASN</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</span>
@endsection
@push('scripts')
<script>
	document.addEventListener("alpine:init",() => {
		Alpine.data("data",() => ({
			init() {
				$('#datatable').DataTable({
					serverSide:true,
					proccessing:true,
					ajax:{
						url:"{{ url('master/eselon/data') }}",
						type:"post",
						data: d => {
							
						},
					},
					columns:[
						{data:"nama"},
						{data:"jabatan_asn"},
					]
					
				});
			}
		}));
	});
</script>
@endpush