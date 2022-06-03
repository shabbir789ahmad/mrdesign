@extends('Dashboard.master')

@section('content')

<form action="{{ route('logo.update',['logo'=>$logo->id]) }}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="row mt-2">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
				<div class="row">
					  <div class="col-md-12 col-12">
						<x-form.input name="logo_detail" value="{{$logo['logo_detail']}}" label="Logo Detail " /> 
						</div>
						
					</div>
                  
					

					
					<div class="form-group mt-3  mb-5">
						
						<x-form.inputimg name="image" label="Logo   "></x-forms.inputimg>
					</div>
					<x-btn.save ></x-btn.save>

				</div>
			</div>
		</div>
	</div>
</form>

@endsection