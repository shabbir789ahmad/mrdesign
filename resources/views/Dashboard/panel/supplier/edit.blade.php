@extends('Dashboard.master')

@section('content')

<form action="{{ route('supplier.update',['supplier'=>$supplier->id]) }}" method="POST" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="row mt-2">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
				<div class="row">
					  <div class="col-md-6 col-12">
						<x-form.input name="supplier_name" value="{{$supplier['supplier_name']}}" label="Supplier Name" /> 
						</div>
						<div class="col-md-6 col-12">
						<x-form.input  name="supplier_email" value="{{$supplier['supplier_email']}}" label="Supplier Email " /> 
						</div>
					</div>
                  
					<div class="row">
					  <div class="col-md-6 col-12">
					  <x-form.input name="supplier_address" value="{{$supplier['supplier_address']}}" label="Supplier Address"></x-forms.input> 
						</div>
						<div class="col-md-6 col-12">
						<x-form.input  name="supplier_phone" value="{{$supplier['supplier_phone']}}" label="Supplier Phone " /> 
						</div>
					</div>

					
					<div class="form-group mt-3  mb-5">
						
						<x-form.inputimg name="image" label="Supplier Image "></x-forms.inputimg>
					</div>
					<x-btn.save ></x-btn.save>

				</div>
			</div>
		</div>
	</div>
</form>

@endsection