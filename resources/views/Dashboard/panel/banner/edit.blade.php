@extends('Dashboard.master')

@section('content')

<form action="{{ route('banner.update',['banner'=>$banner->id]) }}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="row mt-2">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
				
					<div class="form-group mt-3  mb-5">
						
						<x-form.inputimg name="image" label="Banner   "></x-forms.inputimg>
					</div>
					<x-btn.save ></x-btn.save>

				</div>
			</div>
		</div>
	</div>
</form>

@endsection