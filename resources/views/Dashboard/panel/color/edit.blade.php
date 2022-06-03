@extends('Dashboard.master')

@section('content')

<form action="{{ route('color.update',['color'=>$color->id]) }}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="row mt-2">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="form-group mt-3">
						
						<x-form.input name="color" label="Color " value="{{$color['color']}}"></x-forms.input>
						
					</div>
					<div class="form-group mt-3 mb-5">
						
						<x-form.input name="color_name" label="Color Name" value="{{$color['color_name']}}"></x-forms.input>
						
					</div>
					
					<x-btn.save ></x-btn.save>

				</div>
			</div>
		</div>
	</div>
</form>

@endsection