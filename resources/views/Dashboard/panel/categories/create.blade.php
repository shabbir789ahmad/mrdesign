@extends('Dashboard.master')

@section('content')

<form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class="row mt-2">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="form-group mt-3">
						
						<x-form.input name="category_name" label="Category Name"></x-forms.input>
						
					</div>
					<div class="form-group mt-3  mb-5">
						
						<x-form.inputimg name="image" label="Category Image"></x-forms.inputimg>
					</div>
					<x-btn.save ></x-btn.save>

				</div>
			</div>
		</div>
	</div>
</form>

@endsection