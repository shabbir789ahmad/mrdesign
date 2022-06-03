@extends('Dashboard.master')

@section('content')

<form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST">
	@method('PUT')
	@csrf
	<div class="row">
		<div class="col">
			<div class="card">
				<div class="card-body">
					<div class="form-group mt-3">
						
						<x-form.input name="category_name" value="{{$category['category_name']}}" label="Category Name"></x-forms.input>
						
					</div>
					<div class="form-group mt-3  mb-5">
						
						<x-form.inputimg name="image" label="Category Image"></x-forms.inputimg>
							<img src="{{asset('uploads/brand/' .$category['category_image'])}}" width="10%" class="rounded">
					</div>
					<x-btn.update></x-btn.update>
				</div>
			</div>
		</div>
	</div>
</form>

@endsection