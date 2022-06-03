@extends('Dashboard.master')

@section('content')

<form action="{{ route('sub_category.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row mt-2">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="form-group mt-3">
						<label for="" class="fw-bold mb-1">
							Category  <span class="text-danger">*</span>
						</label>
						<x-form.select name="category_id" select="Category" :categories="$categories"></x-forms.select>
						
					</div>

					<div class="form-group mt-3">
						
						<x-form.input name="sub_category_name" label="Sub Category  Name"></x-forms.input>
						
					</div>


					<div class="form-group mt-3  mb-5">
						
						<x-form.inputimg name="image" label="Sub Category Logo "></x-forms.inputimg>
					</div> 	
					<x-btn.save ></x-btn.save>

				</div>
			</div>
		</div>
	</div>
</form>

@endsection