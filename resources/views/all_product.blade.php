@extends('master.master')
@section('content')
<div class="container-fluid">
 <div class="data_sidebar">
  <div class="sidebar">
   
  <span class="cut_icon"><i class="fa-solid fa-circle-xmak text-light">*jj</i></span>
  <div class="abc">sd</div>
 </div>
 <div class="product_bar">
   <div class="product_header bg-danger  py-4">
     <h4 class="ml-3 text-light mt-2">All Product</h4></div>
  <div class="row">
      @foreach($products as $product)
      <div class="col-md-3">
        <x-product.product-component :product="$product" />
      </div>
      <div class="col-md-3">
        <x-product.product-component :product="$product" />
      </div>

      <div class="col-md-3">
        <x-product.product-component :product="$product" />
      </div>
      <div class="col-md-3">
        <x-product.product-component :product="$product" />
      </div>
      <div class="col-md-3">
        <x-product.product-component :product="$product" />
      </div>
      @endforeach
  </div>
</div>
</div>
</div>


@endsection