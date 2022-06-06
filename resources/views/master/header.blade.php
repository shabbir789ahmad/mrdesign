@php
use App\models\Category;
$categories=Category::category();

@endphp
<navbar class="">
           <nav class="top-nav navbar">
             <a href="#" class="nav-logo">mrDesign</a>
             <div class="seach-bar">
               <input type="search" name="search" class="search" />
               <button class="btn-search btn ">Search</button>
             </div>
             <div class="icons ">
             <i class="fas fa-shopping-cart fa-lg mr-1"></i>
             <i class="fas fa-heart fa-lg text-danger ml-2 mr-2"></i>

              @guest
          @if (Route::has('login'))
          <a href="{{route('login')}}" class=" btn  btn-danger">login</a >
          @endif
          @else
          
           
          <div class="btn-group user_img">
            <!-- Default dropstart button -->
            <div class="btn-group dropstart">
              <img src="{{asset('img/avatars/download.png')}}" width="100%" class=" dropdown-toggle user_image" data-bs-toggle="dropdown" aria-expanded="false">
             <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="#">Dashboard</a></li>
               <li><a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Log out
              </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-hidden">
                   @csrf
                </form></li>
             </ul>
            </div>



          </div>
          
     @endguest


             
             </div>
           </nav>

          
        <nav class="navbar bottom-nav ">
            <a href="#" class="nav-logo2">Studio</a>
            <ul class="nav-menu mb-0">
            <li class="nav-item">
                    <a href="{{url('/')}}" class="nav-link slider_text">Home</a>
                </li>
                @forelse($categories as $category)
                <li class="nav-item">
                    <a href="{{route('product.by.category',$category['id'])}}" class="nav-link ">{{$category['category_name']}}</a>
                </li>
                @empty
                @endforelse
                
                
               
                
            </ul>
            <div class="designer_name">
            <a href="#" class="nav-logo3 ">By Shabbir</a>
            <div class="hamburger1">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            </div>
        </nav>
</navbar>