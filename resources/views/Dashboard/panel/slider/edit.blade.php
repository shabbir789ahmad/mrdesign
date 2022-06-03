@extends('Dashboard.master')

@section('content')

<form action="{{ route('slider.update',['slider'=>$slider->id]) }}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="row mt-2">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
				<div class="row">
					  <div class="col-md-6 col-12">
						<x-form.input name="heading" label="Heading " value="{{$slider['heading']}}" /> 
						</div>
						<div class="col-md-6 col-12">
						<x-form.inputimg name="image" label="Slider Image "></x-forms.inputimg>
					
						</div>
					</div>
                  
					

					
					<div class="form-group mt-3  mb-5">
						<lable class="fw-bold">Detail</lable>
						<textarea placeholder="Detail" name="detail" rows="5" class="form-control">{{$slider['detail']}}</textarea>
						
					</div>
					<x-btn.save ></x-btn.save>

				</div>
			</div>
		</div>
	</div>
</form>

@endsection