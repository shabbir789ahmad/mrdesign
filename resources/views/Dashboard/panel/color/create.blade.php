@extends('Dashboard.master')

@section('content')

<form action="{{ route('color.store') }}" method="POST" >
	@csrf
	<div class="row mt-2">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="form-group mt-3">
					
						<x-form.input name="color" label="Color "></x-forms.input>
						
					</div>
					
					<div class="form-group mt-3 mb-4">
					
						<x-form.input name="color_name" label="Color Name"></x-forms.input>
						
					</div>

					<x-btn.save ></x-btn.save>

				</div>
			</div>
		</div>
	</div>
</form>

@endsection