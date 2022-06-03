@extends('Dashboard.master')

@section('content')

<form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row mt-2">
		<div class="col-12">
			<div class="card">
				<h3 class="card-header fw-bold">Create Slider</h3>
				<div class="card-body">
				   <div class="row">
					  <div class="col-md-6 col-12">
						<x-form.input name="heading" label="Heading " /> 
						</div>
						<div class="col-md-6 col-12">
						<x-form.inputimg name="image" label="Slider Image "></x-forms.inputimg>
					
						</div>
					</div>
                  
					

					
					<div class="form-group mt-3  mb-5">
						<lable class="fw-bold">Detail</lable>
						<textarea placeholder="Detail" name="detail" rows="5" class="form-control"></textarea>
						
					</div>
					<x-btn.save ></x-btn.save>

				</div>
			</div>
		</div>
	</div>
</form>

@endsection