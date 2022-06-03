@extends('Dashboard.master')

@section('content')

<div class="row ml-4">
	<div class="col-12">
		<div class="form-group mt-3 mb-3 ">
			<x-btn.link-create route="color.create" ></x-btn.link-create>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body pb-1">
				@if(count($colors) > 0)
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead class="thead-light">
								<tr>
									<th scope="col">Color </th>
									<th scope="col">Color Name</th>
									<th scope="col">Date</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								@foreach($colors as $color)
								<tr>
								<td class="col-1" ><p style="background-color:{{$color['color']}}" class="p-5">.</p></td>
									<td>{{ $color->color_name }}</td>
									<td>{{ $color->created_at }}</td>
									<td>
										<a href="{{ route('color.edit', ['color' => $color->id]) }}" type="submit" class="btn btn-xs btn-info">
											Edit
										</a>
										<form action="{{ route('color.destroy', ['color' => $color->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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
					<x-alert.resource-empty resource="Colors" new="color.create"></x-alert.resource-empty>
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