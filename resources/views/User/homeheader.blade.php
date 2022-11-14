
<div class="container-fluid">
    <div class="row bg-secondary py-2 px-xl-5">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark" href="">FAQs</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Help</a>
                <span class="text-muted px-2">|</span>
                <a class="text-dark" href="">Support</a>
            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-dark px-2" href="https://www.facebook.com/">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-dark px-2" href="https://twitter.com/">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-dark px-2" href="https://www.linkedin.com/">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-dark px-2" href="https://www.instagram.com/">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-dark pl-2" href="https://www.youtube.com/">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold px-3 mr-1"><img src="{{asset('vendors/dist/img/smart.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                                                                                                                           style="opacity: 7.8;  height: 55px; width: 55px"></span>Smart</h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action="{{route('search')}}" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search for products">
                    <div class="input-group-append">
                        <button type="search-" class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">
            <a href="" class="btn border">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge">0</span>
            </a>
            <a href="" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">0</span>
            </a>
        </div>
    </div>
</div>
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link" data-toggle="dropdown">Dresses <i class="fa fa-angle-down float-right mt-1"></i></a>
                        <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                            <a href="{{route('get_gents')}}" class="dropdown-item">Men's Dresses</a>
                            <a href="{{route('get_womens')}}" class="dropdown-item">Women's Dresses</a>
                            <a href="{{route('get_childs')}}" class="dropdown-item">Child's Dresses</a>
                        </div>
                    </div>
                    <a href="{{route('get_shirts')}}" class="nav-item nav-link">Shirts</a>
                    <a href="{{route('get_jeans')}}" class="nav-item nav-link">Jeans</a>
                    <a href="" class="nav-item nav-link">Swimwear</a>
                    <a href="" class="nav-item nav-link">Sleepwear</a>
                    <a href="" class="nav-item nav-link">Sportswear</a>
                    <a href="" class="nav-item nav-link">Jumpsuits</a>
                    <a href="" class="nav-item nav-link">Blazers</a>
                    <a href="" class="nav-item nav-link">Jackets</a>
                    <a href="" class="nav-item nav-link">Shoes</a>
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                        <a href="{{route('shop_view')}}" class="nav-item nav-link">Shop</a>
                        <a href="{{route('contact_view')}}" class="nav-item nav-link">Contact</a>
                    </div>
                    <div class="navbar-nav ml-auto py-0">

                                       <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           <button class="btn btn" style="background-color: #D19C97;color: white">Logout</button>
                                       </a>

                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                        </form>


                    </div>
                </div>
            </nav>

            <div class="topbanner" >

                @foreach($randoms as $product)

                <a href="{{route('click_details',$product->id)}}"><img  class="img-fluid" src="{{asset('storage/vendors/dist/all/'.$product->product_image)}}" style=" background:transparent; color: #FFFFFF; margin-left: 80px;  margin-top: 20px; height: 130px;   position: absolute;   width: 150px; border-radius: 80px; z-index: 8; opacity:1.0!important" alt="Image"></a>

                @endforeach

                @foreach($randoms1 as $product)

                <a href="{{route('click_details',$product->id)}}"><img  class="img-fluid" src="{{asset('storage/vendors/dist/all/'.$product->product_image)}}" style=" background:transparent; color: #FFFFFF; margin-left: 80px;  margin-top: 260px; height: 130px;   position: absolute;   width: 150px; border-radius: 80px; z-index: 8; opacity:1.0!important" alt="Image"></a>

                @endforeach

                    @foreach($randoms2 as $product)
                <a href="{{route('click_details',$product->id)}}"><img  class="img-fluid" src="{{asset('storage/vendors/dist/all/'.$product->product_image)}}" style=" background:transparent; color: #FFFFFF; margin-left: 700px;  margin-top: 260px; height: 130px;   position: absolute; border-radius: 80px;  width: 150px;  z-index: 8; opacity:1.0!important" alt="Image"></a>

                    @endforeach


                    @foreach($randoms3 as $product)
                    <a href="{{route('click_details',$product->id)}}"><img  class="img-fluid" src="{{asset('storage/vendors/dist/all/'.$product->product_image)}}" style=" background:transparent; color: #FFFFFF; margin-left: 700px;  margin-top: 20px; height: 130px;   position: absolute;  border-radius: 80px; width: 150px;  z-index: 8; opacity:1.0!important" alt="Image"></a>
                    @endforeach


            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                        @foreach($all_record as $product)

                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="height: 410px;">
                        <img class="img-fluid" src="{{asset('storage/vendors/dist/all/'.$product->product_image)}}" style="height: 935px;"
                            alt="Image">

                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">10% Off Your First Order</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">{{ $product->product_price }}</h3>
                                <a href="" class="btn btn-light py-2 px-3">Shop Now</a>



                            </div>
                        </div>
                        </div>
                        @endforeach

                </div>

                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>
</div>
