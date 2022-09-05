@include('front.includes.header')
{{-- <section style="background-color: #eee;">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
          <div class="card text-black">
            <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
            <img src="{{asset('product_images/' .$product->images[0]->photo)}}"
              class="card-img-top" alt="Apple Computer" />
            <div class="card-body">
              <div class="text-center">
                <h5 class="card-title">{{$product->name}}</h5>
                <p class="text-muted mb-4">Apple pro display XDR</p>
              </div>
              <div>
                <div class="d-flex justify-content-between">
                  <span> price</span><span>{{$product->price}}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>specialprice</span><span>{{$product->special_price}}</span>
                </div>
                <div class="d-flex justify-content-between">
                  <span>description</span><span>{{$product->description}}</span>
                </div>
              </div>
              <div class="d-flex justify-content-between total font-weight-bold mt-4">
                <span>Total</span><span>$7,197.00</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section> --}}

  <!doctype html>
                        <html>
                            <head>
                                <meta charset='utf-8'>
                                <meta name='viewport' content='width=device-width, initial-scale=1'>
                                <title>Snippet - GoSNippets</title>
                                <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='' rel='stylesheet'>
                                <style>body {
    font-family: 'Roboto Condensed', sans-serif;
    background-color: #f5f5f5
}

.hedding {
    font-size: 20px;
    color: #ab8181`;
}

.main-section {
    position: absolute;
    left: 50%;
    right: 50%;
    transform: translate(-50%, 5%);
}

.left-side-product-box img {
    width: 100%;
}

.left-side-product-box .sub-img img {
    margin-top: 5px;
    width: 83px;
    height: 100px;
}

.right-side-pro-detail span {
    font-size: 15px;
}

.right-side-pro-detail p {
    font-size: 25px;
    color: #a1a1a1;
}

.right-side-pro-detail .price-pro {
    color: #E45641;
}

.right-side-pro-detail .tag-section {
    font-size: 18px;
    color: #5D4C46;
}

.pro-box-section .pro-box img {
    width: 100%;
    height: 200px;
}

@media (min-width:360px) and (max-width:640px) {
    .pro-box-section .pro-box img {
        height: auto;
    }
}</style>
                                <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
                                <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>
                            </head>
                            <body oncontextmenu='return false' class='snippet-body'>
                            <div class="container">
    <div class="col-lg-8 border p-3 main-section bg-white">
        <div class="row hedding m-0 pl-3 pt-0 pb-3">
            Product Details
        </div>
        <div class="row m-0">
            <div class="col-lg-4 left-side-product-box pb-3">



                <img src="{{asset('product_images/' .$product->images[0]->photo)}}">
                <span class="sub-img">
                    @foreach ($product->images as $item)
                    <img src="{{asset('product_images/' .$item->photo)}}" class="border p-2">
                    @endforeach
                </span>
            </div>
            <div class="col-lg-8">
                <div class="right-side-pro-detail border p-3 m-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="m-0 p-0">{{$product->name}}</p>
                        </div>
                        <div class="col-lg-12">
                            <p class="m-0 p-0 price-pro">{{$product->price}}</p>
                            <hr class="p-0 m-0">
                        </div>
                        <div class="col-lg-12 pt-2">
                            <h5>description</h5>
                            <span>{{$product->description}}</span>
                            <hr class="m-0 pt-2 mt-2">
                        </div>
                        <div class="col-lg-12">
                            <p class="tag-section"><strong>Tag : </strong>
                                @foreach ($product->tags as $tag)
                                <a href="">{{$tag->name}}</a>
                                @endforeach

                            </p>
                        </div>
                        <div class="col-lg-12">
                            <h6>Quantity :</h6>
                            <input type="number" class="form-control text-center w-100" value="1">
                        </div>
                        <div class="col-lg-12 mt-3">
                            <div class="row">
                                <div class="col-lg-6 pb-2">
                                    <a href="#" class="btn btn-danger w-100">Add To Cart</a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="#" class="btn btn-success w-100">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center pt-3">
                <h4>More Product</h4>
            </div>
        </div>
        <div class="row mt-3 p-0 text-center pro-box-section">
            <div class="col-lg-3 pb-2">
                <div class="pro-box border p-0 m-0">
                    <img src="http://nicesnippets.com/demo/pd-b-image1.jpg">
                </div>
            </div>
            <div class="col-lg-3 pb-2">
                <div class="pro-box border p-0 m-0">
                    <img src="http://nicesnippets.com/demo/pd-b-images2.jpg">
                </div>
            </div>
            <div class="col-lg-3 pb-2">
                <div class="pro-box border p-0 m-0">
                    <img src="http://nicesnippets.com/demo/pd-b-images3.jpg">
                </div>
            </div>
            <div class="col-lg-3 pb-2">
                <div class="pro-box border p-0 m-0">
                    <img src="http://nicesnippets.com/demo/pd-b-images4.jpg">
                </div>
            </div>
        </div>
    </div>
</div>
                            <script type='text/javascript'></script>
                            </body>
                        </html>

