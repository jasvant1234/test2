<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->

    <!-- Topbar End -->


    <!-- Navbar Start -->
   @include('User.header');
    <!-- Navbar End -->
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('home')}}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle" id="hide">
                        <tr>
                            <td class="align-middle"><img src="{{asset('storage/vendors/dist/all/'.$get_cart_record->product_image)}}" alt="" style="width: 50px;"> Colorful Stylish Shirt</td>
                            <td class="align-middle">{{$get_cart_record->product_price}}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus btn-decrement">
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" id="quantity" class="form-control form-control-sm bg-secondary text-center" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus btn-increment">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle" id="price">{{$get_cart_record->product_price}}</td>
                            <td class="align-middle"><button onclick="clickme()" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium" id="subtotal">{{$get_cart_record->product_price}}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">{{$get_cart_record->shipping_charge}}</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold" id="total">{{$get_cart_record->product_price + $get_cart_record->shipping_charge}}</h5>
                        </div>
                        <a href="{{route('checkout_process',$get_cart_record->id)}}" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Start -->
    @include('User.footer');
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
</body>

</html>


<script>

    let valueCount=1;
    let increment=document.querySelector(".btn-increment");
    let decrement=document.querySelector(".btn-decrement");
    let  count =document.querySelector("#quantity");
    let  totalcount =document.querySelector("#price");
    let  totalcount2 =document.querySelector("#subtotal");
    let  totalcount3 =document.querySelector("#total");
    //NOW AM CREATING A ARROW FUNCTION
    increment.addEventListener("click",()=>{
        let add=  valueCount++;
        count.value=add;
        totalcount.innerHTML=add*{{$get_cart_record->product_price}};
        totalcount2.innerHTML=add*{{$get_cart_record->product_price}}; //ADDING(INCREMENT) FUCTION IS COMPLETED
        totalcount3.innerHTML={{$get_cart_record->shipping_charge}}+add*{{$get_cart_record->product_price}}; //ADDING(INCREMENT) FUCTION IS COMPLETED
    })

    decrement.addEventListener("click",()=>{
        //THIS IS DECREMENT FUNCTION  IN THIS AN GIVING A CONDITION TWO DISABLE THE (-)VALUES
        if(valueCount>=2){
            let sub =--valueCount;
            count.value=sub;
            totalcount.innerHTML=sub*{{$get_cart_record->product_price}};
            totalcount2.innerHTML=sub*{{$get_cart_record->product_price}};
            totalcount3.innerHTML={{$get_cart_record->shipping_charge}}+sub*{{$get_cart_record->product_price}};
            //lets cheack yhe decrement is working or not
            //DECREMENT FUNCTION IS ALSO COMPLETE
        }

    })

    function clickme() {

        document.getElementById('hide').style.display = 'none';

    }


</script>
