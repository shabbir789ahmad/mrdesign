
  <div class="card card_image shadow">
    <a href="{{route('product.detail',$product['id'])}}" > <img src="{{asset('uploads/img/'.$product->image['product_image'])}}" alt="product image" width="100%" height="350rem"   /></a>
    <div class="card_icons">
      
      <i class="fas fa-heart"></i>
      <i class="fas fa-heart icon_ac"></i>
       <i class="fas fa-shopping-cart "></i>
    </div>
    <p class="discount">70%</p>
    <div class="card-body p-0 pb-2">
      <div class="product_detail">
        <h3>{{$product['product_name']}}</h3>
        <p>${{$product['price']}}.00 <span>${{$product['discount_price']}}.00</span></p>
      </div>
      <div class="footer">
        <div class="product_colors ml-2">
         <span class="bg-danger">.</span>
         <span class="bg-info">.</span>
         <span class="bg-dark">.</span>
        </div>
        <div class="star mr-2">
          @for($i=0; $i<5; $i++)
          @if($i<$product['rating'])
           <span class="fa fa-star fa-lg text-warning"></span>
           @else
         <span class="fa fa-star fa-lg"></span>
           @endif
         @endfor
        </div>
      </div>
    </div>
  </div> 
  