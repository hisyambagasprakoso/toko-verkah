<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Toko Verxah | Ecommerce No.1 di Sragentina</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- gLightbox gallery-->
    <link rel="stylesheet" href="{{asset('tokoverkah/assets/vendor/glightbox/css/glightbox.min.css')}}">
    <!-- Range slider-->
    <link rel="stylesheet" href="{{asset('tokoverkah/assets/vendor/nouislider/nouislider.min.css')}}">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="{{asset('tokoverkah/assets/vendor/choices.js/public/assets/styles/choices.min.css')}}">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="{{asset('tokoverkah/assets/vendor/swiper/swiper-bundle.min.css')}}">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('tokoverkah/assets/vendor/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('tokoverkah/assets/vendor/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
  </head>
  <body>
    <div class="page-holder">
      <!-- navbar-->
      <!--  Modal -->
      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Checkout</h1>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <!-- BILLING ADDRESS-->
          <h2 class="h5 text-uppercase mb-4">Billing details</h2>
          <div class="row">
            <div class="col-lg-6">
              <form action="{{url('create-checkout')}}" method="POST" data-action="{{route('checkout.create')}}" enctype="multipart/form-data" id="form" name="add-check-out-form">
                {{-- <div class="row gy-3"> --}}
                    @csrf
                  <div class="form-group col-lg-12">
                    <label class="form-label text-sm text-uppercase" for="merchant">Merchant </label>
                    <select class="form-select form-control-lg" id="mrc" name="merchant_id" aria-label="Default select example">
                        @foreach ($merchants as $merchant)
                            <option value="{{$merchant->id}}">{{$merchant->username}}</option>
                        @endforeach
                    </select>
                  </div>
                  &nbsp;
                  <div class="form-group col-lg-12">
                    <label class="form-label text-sm text-uppercase" for="paymenttype">Payment Type </label>
                    <select class="form-select form-control-lg" id="pymnt" name="payment_type" aria-label="Default select example">
                        @foreach ($payments as $payment)
                            <option value="{{$payment->id}}">{{$payment->name}}</option>
                        @endforeach
                    </select>
                  </div>
                  &nbsp;
                  <div class="form-group col-lg-12">
                    <label class="form-label text-sm text-uppercase" for="notes">Notes </label>
                    <textarea class="form-control form-control-lg" id="ct" name="content" placeholder="Enter Notes Here.."></textarea>
                  </div>
                  &nbsp;
                  <div class="form-group col-lg-12">
                    <label class="form-label text-sm text-uppercase" for="phone">Amount </label>
                    <input class="form-control form-control-lg" id="amnt" name="amount" placeholder="e.g. 500.000">
                  </div>
                  &nbsp;
                  <div class="col-lg-12">
                    <a href="javascript: submit()">
                        <button class="btn btn-dark" type="submit">Pay</button>
                    </a>
                  </div>
                {{-- </div> --}}
              </form>
            </div>
            <!-- ORDER SUMMARY-->
            <div class="col-lg-6">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                    <h4 class="d-flex align-items-center justify-content-between"><strong class="medium fw-bold">Adidas - 01</strong><span>IDR. 500000</span></h4>
                  <img src="{{ asset('tokoverkah/assets/images/products/img-6.png')}}" width="304" height="236" class="mx-auto d-block">
                  <ul class="list-unstyled mb-0">
                    <li class="d-flex align-items-center justify-content-between"><span>Brand</span><span>Adidas</span></li>
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between"><span>Color</span><span>Blue</span></li>
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between"><span>Size</span><span>Large</span></li>
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between"><span>Material</span><span>Dry Fit</span></li>
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between"><span>Stock</span><span>125</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
</body>
</html>

<!-- JavaScript files-->
<script src="{{asset('tokoverkah/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('tokoverkah/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('tokoverkah/assets/vendor/nouislider/nouislider.min.js')}}"></script>
<script src="{{asset('tokoverkah/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('tokoverkah/assets/vendor/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<script src="{{asset('tokoverkah/assets/js/front.js')}}"></script>
<script>
  // ------------------------------------------------------- //
  //   Inject SVG Sprite -
  //   see more here
  //   https://css-tricks.com/ajaxing-svg-sprite/
  // ------------------------------------------------------ //
  function injectSvgSprite(path){
      var ajax = new XMLHttpRequest();
      ajax.open("GET", path, true);
      ajax.send();
      ajax.onload = function(e) {
      var div = document.createElement("div");
      div.className = 'd-none';
      div.innerHTML = ajax.responseText;
      document.body.insertBefore(div, document.body.childNodes[0]);
      }
  }
  // this is set to BootstrapTemple website as you cannot
  // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
  // while using file:// protocol
  // pls don't forget to change to your domain :)
  injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg')
</script>
<!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<script type="text/javascript">
    $(document).ready( function () {
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
    });

    function submit(){
        form.submit();
        alert("Data stored in database!");
    }

    $('#add-check-out-form').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type:'POST',
        url: "{{url('create-checkout')}}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            $("#savedata").html('Submit');
            $("#savedata"). attr("disabled", false);
        },
        error: function(data){
        console.log(data);
        }
        });
    });
</script>
