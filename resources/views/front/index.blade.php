@extends('front.layouts.master')

@section('content')



    <header class="header" id="header">
        <nav class="navbar container">
            <a href="#" class="brand"><img src="{{asset('medex.jpg')}}" width="60px" height="60px" style="margin-top: 10px"></a>
            <div class="burger" id="burger">
                <span class="burger-line"></span>
                <span class="burger-line"></span>
                <span class="burger-line"></span>
            </div>
            <span class="overlay"></span>
            <span><i class="bx bx-search search-toggle"></i></span>
            <div class="search-block">
                <form class="search-form">
                    <span><i class="bx bx-arrow-back search-cancel"></i></span>
                    <input type="search" name="search" class="search-input" style="background-color: #f0a70d" placeholder="Search here...">
                </form>
            </div>
        </nav>
    </header>


    <!-- ------- BANNER ---------- -->
        <div class="home_banner container-fluid p-0" style="position: relative;">
            <div class="owl-slider owl-carousel owl-theme banner">
                <div class="item">
                    <img src="{{asset('assets/img/banner-4.jpg')}}" alt="" class="image-fluid">
                    <div class="caption">
                        <div class="col-12 d-flex justify-content-center">
                            <h1>MedexSepeti</h1>
                        </div>
                        <div class="banner_url w-100">
                            <div class="col-12 d-flex justify-content-center mb-1 mb-sm-3">
                                <i class="fas fa-down-long"></i>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <a href="">learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('assets/img/banner-4.jpg')}}" alt="" class="image-fluid">
                    <div class="caption">
                        <div class="col-12 d-flex justify-content-center">
                            <h1>MedexSepeti</h1>
                        </div>
                        <div class="banner_url w-100">
                            <div class="col-12 d-flex justify-content-center mb-1 mb-sm-3">
                                <i class="fas fa-down-long"></i>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <a href="">learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src="{{asset('assets/img/banner-1.jpg')}}" alt="" class="image-fluid">
                    <div class="caption">
                        <div class="col-12 d-flex justify-content-center">
                            <h1>MedexSepeti</h1>
                        </div>
                        <div class="banner_url w-100">
                            <div class="col-12 d-flex justify-content-center mb-1 mb-sm-3">
                                <i class="fas fa-down-long"></i>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <a href="">learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-theme">
                <div class="owl-controls">
                    <div class="custom-nav owl-nav"></div>
                </div>
            </div>
        </div>


        <!-- ------- ARTICLES ---------- -->
        <section class="article_sec container-fluid">
            <div class="row">
                <h2 class="col-12">Special Offer</h2>
                        <div class="container">
                            <div class="row">
                                @isset($products)
                                @foreach($products as $index => $product)
                                <div class="col-12 col-sm-8 col-md-6 col-lg-4 offer">
                                    <div class="card"  >
                                        <img class="card-img"  width="100px" src="{{asset('images/'.$product->image.'')}}"  alt="Vans">
                                        <div class="card-img-overlay d-flex justify-content-end">
                                            <a href="#" class="card-link text-danger like">
                                                <i class="fas fa-heart"></i>
                                            </a>
                                        </div>
                                        <div class="card-body" >
                                            <h4 class="card-title">{{$product->title}}</h4>
                                            <h6 class="card-subtitle mb-2 text-muted">Style: VA33TXRJ5</h6>
                                            <p class="card-text">
                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has                                            <div class="options d-flex flex-fill">
                                            </div>
                                            <div class="buy d-flex justify-content-between align-items-center">
                                                <div class="price text-success"><h5 class="mt-4">{{$product->price}}</h5></div>
                                                <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                <div class="col-12 text-center mt-md-4 mt-0">
                    <a href="#" class="btn btn-secondary" id="seeMore">See More Offer</a>
                </div>
            </div>
        </section>

        <!-- ------- Main Categories ---------- -->
        <section class="categories_sec container-fluid" style="position: relative;">
            <div class="row">
                <h2 class="col-12">Brands</h2>
                @isset($categories)
                    @foreach($categories as $category)
                        <div class="col-12 col-sm-6 col-md-4 mb-5 category">
                            <figure>

                                <img src="{{asset('assets/front/img/category.png')}}" alt="" class="image-fluid">
                                <figcaption>
                                    <h5>{{$category->title}}</h5>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach
                @endif
                <div class="col-12 text-center mt-0">
                    <a href="#" class="btn btn-danger" id="seeMoreCategory">See More Brands</a>
                </div>

            </div>
        </section>

        <!-- ------- Products ---------- -->


        <div class="container-fluid bg-trasparent my-4 p-3 fluid" style="position: relative">
            <h2 class="col-12">The most viewed products</h2>
            <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
                @isset($products_views)
                    @foreach($products_views as $product_views)
                <div class="col hp views">
                    <div class="card h-100 shadow-sm">
                        <a target="_blank" href="#">
                            <img src="{{asset('images/'.$product_views->image.'')}}" class="card-img-top" alt="product.title" />
                        </a>

                        <div class="label-top shadow-sm">
                            <a class="text-white" target="_blank" href="https://amzn.to/3qeS1Fe">{{$product_views->category->title}}</a>
                        </div>
                        <div class="card-body">
                            <div class="clearfix mb-3">
                                <span class="float-start badge rounded-pill bg-success">{{$product_views->price}}</span>

                                <?php
                                $tags = explode(',',$product_views->tags);
                                ?>
                                @foreach($tags as $tag)
                                <p class="float-end" style="margin-left: 10px"><a href="#" class="small text-muted text-uppercase aff-link">{{$tag}}</a></p>
                                @endforeach
                            </div>
                            <h5 class="card-title">
                                <a target="_blank" href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad</a>
                            </h5>

                            <div class="d-grid gap-2 my-4">

                                <a href="#" class="btn btn-warning bold-btn">add to cart</a>

                            </div>
                            <div class="clearfix mb-1">

                                <span class="float-start"><a href="#"><i class="fas fa-question-circle"></i></a></span>

                                <span class="float-end">
                                <i class="far fa-heart" style="cursor: pointer"></i>

                                 </span>
                            </div>
                        </div>
                    </div>
                </div>
                        <div class="col hp views">
                            <div class="card h-100 shadow-sm">
                                <a target="_blank" href="#">
                                    <img src="{{asset('images/'.$product_views->image.'')}}" class="card-img-top" alt="product.title" />
                                </a>

                                <div class="label-top shadow-sm">
                                    <a class="text-white" target="_blank" href="https://amzn.to/3qeS1Fe">{{$product_views->category->title}}</a>
                                </div>
                                <div class="card-body">
                                    <div class="clearfix mb-3">
                                        <span class="float-start badge rounded-pill bg-success">{{$product_views->price}}</span>

                                        <?php
                                        $tags = explode(',',$product_views->tags);
                                        ?>
                                        @foreach($tags as $tag)
                                            <p class="float-end" style="margin-left: 10px"><a href="#" class="small text-muted text-uppercase aff-link">{{$tag}}</a></p>
                                        @endforeach
                                    </div>
                                    <h5 class="card-title">
                                        <a target="_blank" href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad</a>
                                    </h5>

                                    <div class="d-grid gap-2 my-4">

                                        <a href="#" class="btn btn-warning bold-btn">add to cart</a>

                                    </div>
                                    <div class="clearfix mb-1">

                                        <span class="float-start"><a href="#"><i class="fas fa-question-circle"></i></a></span>

                                        <span class="float-end">
                                <i class="far fa-heart" style="cursor: pointer"></i>

                                 </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif


            </div>
            <br>
            <div class="col-12 text-center mt-0">
                <a href="#" class="btn btn-success" id="seeMoreProducts">See More Products</a>
            </div>
        </div>







{{--        <section class="job_sec container-fluid">--}}
{{--            <div class="row">--}}
{{--                <h2 class="col-12"></h2>--}}
{{--                @isset($products_views)--}}
{{--                @foreach($products_views as $product_views)--}}
{{--                <div class="col-12 col-md-4 mb-5 views" >--}}
{{--                    <div class="job_content">--}}
{{--                        <figure class="d-flex align-items-start justify-content-between mb-1">--}}
{{--                            <div class="d-flex align-items-start">--}}
{{--                                <img src="{{asset('images/'.$product_views->image.'')}}" height="80px" width="300px" alt="">--}}
{{--                            </div>--}}
{{--                        </figure>--}}
{{--                        <div class="jobDetails row">--}}

{{--                            @foreach($tags as $tag)--}}
{{--                            <div class="col-2"><p>{{$tag}}</p></div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                        <div class="about_job">--}}
{{--                            <h6 style="font-size: 14px;" class="mb-1">Details</h6>--}}
{{--                            <p>--}}
{{--                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has--}}

{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <div class="jobPost d-flex justify-content-between align-items-center mt-3">--}}
{{--                            <h6>{{$product_views->price}}</h6>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--                @endif--}}


{{--                <a href="#" id="seeMoreViews" class="moreJobs mt-md-5 mt-0">--}}
{{--                    <span>See More Products</span>--}}
{{--                    <i class="fa-solid fa-spinner"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </section>--}}

{{--        <!-- ------- Top Offers ---------- -->--}}
{{--        <section class="offer_sec container-fluid" style="position: relative;">--}}
{{--            <div class="row">--}}
{{--                <h2 class="col-12">{{trans('front.Top Offers')}}</h2>--}}
{{--                <div class="owl-slider owl-carousel owl-theme owl-centered">--}}
{{--                    @isset($offers)--}}
{{--                   @foreach($offers as $offer)--}}
{{--                    <a href="{{route('front.offer_details',$offer->id)}}" class="item">--}}
{{--                        <img src="{{$offer->image}}" alt="" class="image-fluid">--}}
{{--                        <div class="offer_overlay">--}}
{{--                            <i class="fas fa-magnifying-glass"></i>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                    @endforeach--}}
{{--                        @endif--}}
{{--                </div>--}}
{{--                <div class="owl-theme">--}}
{{--                    <div class="owl-controls">--}}
{{--                        <div class="custom-nav owl-nav"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <a href="{{route('front.offers')}}" class="moreOffers mt-md-5 mt-0">--}}
{{--                    <span>{{trans('front.more offers')}}</span>--}}
{{--                    <i class="fa-solid fa-arrow-right-long"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </section>--}}



@endsection
@section('script')


  <script>
      $(document).ready(function(){
          $(".offer").hide();
          $(".offer").slice(0,3).show();
          $("#seeMore").click(function(e){
              e.preventDefault();
              $(".offer:hidden").slice(0,3).fadeIn("slow");

              if($(".offer:hidden").length == 0){
                  $("#seeMore").fadeOut("slow");
              }
          });


          $(".category").hide();
          $(".category").slice(0,3).show();
          $("#seeMoreCategory").click(function(e){
              e.preventDefault();
              $(".category:hidden").slice(0,3).fadeIn("slow");

              if($(".category:hidden").length == 0){
                  $("#seeMoreCategory").fadeOut("slow");
              }
          });

          $(".views").hide();
          $(".views").slice(0,4).show();
          $("#seeMoreProducts").click(function(e){
              e.preventDefault();
              $(".views:hidden").slice(0,4).fadeIn("slow");

              if($(".views:hidden").length == 0){
                  $("#seeMoreProducts").fadeOut("slow");
              }
          });
      })
  </script>
@endsection
