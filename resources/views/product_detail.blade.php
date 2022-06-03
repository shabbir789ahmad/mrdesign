@extends('master.master')

@section('content')


<section class="container-fluid mt-3" style="width:95%">
 <div class="row">
    <div class="col-md-5">
      @foreach($product->images as $image)
      @if($loop->first)
      <div class="main_image">
        
        <img src="{{asset('uploads/img/'.$image['product_image'])}}" alt="product image" width="100%" height="700rem" class="rounded " id="image" />
      </div>
     @endif
     @endforeach
     
      <div class="small_image">
      @foreach($product->images as $image)
        <img src="{{asset('uploads/img/'.$image['product_image'])}}" alt="product image"  class="rounded small_images"  />
        @endforeach
      </div>
     
   </div >

   <div class="col-md-5 ">
    <h3 class="product_name">{{$product['product_name']}}</h3>
    <div class="detail">
        <p>{{$product['product_detail']}}</p>
        <h4 class="mb-0">Rs. {{$product['discount_price']}}.00</h4>
        <p><s class="text-danger mt-0">Rs. {{$product['price']}}.00</s> <span class="ml-2">{{floor($product['discount_price']/$product['price']*100)}}%</span></p>
        <p>Taxes and Pakistan Include International shipping Calculated at shipping</p>
    </div>

     <p>In Stock</p>
    <div class="select d-flex">
        <div class="color">
         <select >
            <option>red</option>
         </select>
        </div>
        <div class="color">
         <select class="">
            <option>red</option>
        </select>
     </div>
    </div>
    <div class="button">
        <button class="btn btn-block add_to_cart">ADD TO CART</button>
        <button class="btn buy_now btn-block">ADD TO CART</button>
    </div>
   </div>

 </div>
   
</section>   


<section class="container-fluid mt-5 container_width " >
 <div class="see_all">
   <h3 class="text-dark ">Hot Product</h3>
   <button class="btn btn-lg ">See All</button>
 </div>

<div class="owl-carousel mt-1">
  @foreach($products as $product)
    <x-product.product-component :product="$product" />
    @endforeach

</div>

</section>

@endsection

@section('script')
<script>
  $('.small_images').click(function(){
  
     let image=$(this).attr('src');
     $('#image').attr('src',image)

  });
</script>
@endsection
