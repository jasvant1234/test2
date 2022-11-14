<!-- Footer Start -->
<div class="container-fluid bg-secondary text-dark mt-5 pt-5">
    <div class="row px-xl-5 pt-5">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
            <a href="" class="text-decoration-none">

                <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border  px-3 mr-1"><img src="{{asset('vendors/dist/img/smart-new.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                                                                                                                                                style="opacity: 7.8; height: 50px; width: 80px"></span>Smart</h1>
            </a>
            <p>Dolore erat dolor sit lorem vero amet. Sed sit lorem magna, ipsum no sit erat lorem et magna ipsum dolore amet erat.</p>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Khodala, Palanpur, 385001</p>
            <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>jasvant@gmail.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>+012 345 67890</p>
        </div>
        <div class="col-lg-8 col-md-12">
            <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.html"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.html"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark" href="contact.html"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-dark mb-2" href="{{route('home')}}"><i class="fa fa-angle-right mr-2"></i>Home</a>
                        <a class="text-dark mb-2" href="{{route('shop_view')}}"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                        <a class="text-dark" href="{{route('contact_view')}}"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                    </div>
                </div>


                <div class="col-md-4 mb-5">
                    <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                    <form  method="post">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control border-0 py-4" placeholder="Your Email"
                                   required="required" />
                        </div>

                        <div>
                            <button type="submit" name="submit" class="btn btn-primary btn-block border-0 py-3" >Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row border-top border-light mx-xl-5 py-4">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-dark">
                &copy; <a class="text-dark font-weight-semi-bold" href="#">Smart</a>. All Rights Reserved. Designed
                by Jas 2022-2023
                <!-- <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a> -->
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="img/payments.png" alt="">
        </div>
    </div>
</div>
<!-- Footer End -->
