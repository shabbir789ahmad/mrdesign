@extends('Dashboard.master')

@section('content')

<div class="row ml-4">
	<div class="col-12">
		<div class="form-group mt-3 mb-3 ">
			<x-btn.link-create route="supplier.create" ></x-btn.link-create>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body pb-1">
				@if(count($suppliers) > 0)
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead class="thead-light">
								<tr>
								<th scope="col"> Image </th>
									<th scope="col"> Name </th>
									<th scope="col"> Email</th>
									<th scope="col"> Phone</th>
									<th scope="col"> Address</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								@foreach($suppliers as $supplier)
								<tr>
									<td class="col-2 text-center"><img src="{{asset('uploads/brand/' .$supplier->supplier_image)}}" class="rounded" width="50%" height="60rem"></td>
									<td>{{ $supplier->supplier_name }}</td>
									<td>{{ $supplier->supplier_email }}</td>
									<td>{{ $supplier->supplier_phone }}</td>
									<td>{{ $supplier->supplier_address }}</td>
									<td>
										<a href="{{ route('supplier.edit', ['supplier' => $supplier->id]) }}" type="submit" class="btn btn-xs btn-info">
											Edit
										</a>
										<form action="{{ route('supplier.destroy', ['supplier' => $supplier->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
											@method('DELETE')
											@csrf
											<button type="submit" class="btn btn-xs btn-danger">
												Delete
											</button>
										</form>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				@else
					<x-alert.resource-empty resource="supplier" new="supplier.create"></x-alert.resource-empty>
				@endif			
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')

@parent

<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false
    } );
});
</script>
@endsection