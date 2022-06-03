@extends('Dashboard.master')

@section('content')

<form action="{{ route('brand.update',['brand'=>$brand->id]) }}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="row mt-2">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="form-group mt-3">
						
						<x-form.input name="brand_name" label="Brand Name" value="{{$brand['brand_name']}}"></x-forms.input>
						
					</div>
					<div class="form-group mt-3  mb-5">
						
						<x-form.inputimg name="image" label="Brand Logo" ></x-forms.inputimg>
							<img src="{{asset('uploads/brand/' .$brand['brand_image'])}}" width="10%" class="rounded mt-2">
					</div>
					<x-btn.save ></x-btn.save>

				</div>
			</div>
		</div>
	</div>
</form>

@endsection