@extends('master.master')

@section('content')
<header>
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    @foreach($sliders as $slider)
    <div class="carousel-item @if($loop->first) active @endif ">
      <img  src="{{asset('uploads/brand/'.$slider['slider_image'])}}" class="d-block w-100 slider_image" alt="...">
    </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</header>

<section class="container-fluid mt-5" style="width:95%">
  
   <div class="row">
    <div class="col-md-5">
      @foreach($banners->slice(0,1) as $banner)
      <div class="main_image">
        <img src="{{asset('uploads/brand/'.$banner['banner_image'])}}" alt="product image" width="100%" class="rounded product_image" />
      </div>
      @endforeach  
      </div >
    <div class="col-md-7">
      <div class="row">
        @foreach($banners->slice(1,1) as $banner)
       <div class="col-md-12">
       <img src="{{asset('uploads/brand/'.$banner['banner_image'])}}" alt="product image" width="100%" class="rounded product_image2" />
       </div>
       @endforeach  
       @foreach($banners->slice(2,2) as $banner)
       <div class="col-md-6 mt-3">
       <img src="{{asset('uploads/brand/'.$banner['banner_image'])}}" alt="product image" width="100%" class="rounded product_image2" />
       </div>
       @endforeach  
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

<!-- top user review  -->

<section class="container-fluid mt-5 container_width" >
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active text-center slider_text ">
      <h3 class="mt-5 mb-5">Testimonial</h3>
      <img  src="{{asset('img/photos/unsplash-1.jpg')}}" class=" slider_review_image" alt="...">
      <p class="mt-3 mb-1">Hi This is Amzaing webstes .on time deely cheap rates . very good serveice thanks</p>
      <p >Hi This is Amzaing webstes .on time.</p>
      <h3 class="mb-5">Shabbir Ahmad</h3>
    </div>
    
    <div class="carousel-item  text-center slider_text">
      <h3 class="mt-5 mb-5">Testimonial</h3>
      <img  src="{{asset('img/photos/unsplash-1.jpg')}}" class=" slider_review_image" alt="...">
      <p class="mt-3 mb-1">Hi This is Amzaing webstes .on time deely cheap rates . very good serveice thanks</p>
      <p >Hi This is Amzaing webstes .on time.</p>
      <h3 class="mb-5">Shabbir Ahmad</h3>
    </div>
    <div class="carousel-item  text-center slider_text">
      <h3 class="mt-5 mb-5">Testimonial</h3>
      <img  src="{{asset('img/photos/unsplash-1.jpg')}}" class=" slider_review_image" alt="...">
      <p class="mt-3 mb-1">Hi This is Amzaing webstes .on time deely cheap rates . very good serveice thanks</p>
      <p >Hi This is Amzaing webstes .on time.</p>
      <h3 class="mb-5">Shabbir Ahmad</h3>
    </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>


@endsection
