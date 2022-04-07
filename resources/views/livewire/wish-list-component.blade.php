<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Wish List</span></li>
            </ul>
            <style>
                .wish-product{
                    position: absolute;
                    left: 0;
                    right: 30px;
                    top: 10%;
                    z-index: 99;
                    text-align: right;
                    padding-top: 0;
                }
                .wish-product .fa{
                    color: #cdcdcd;
                    font-size: 32px;
                }
                .wish-product .fa:hover{
                    color: #ff7007;
                }
                .wish-product .fill{
                    color: #ff7007;
                }
            </style>
            <div class="row">
                @if (Cart::instance('wishList')->content()->count() > 0)
                <ul class="product-list grid-products equal-container">

                    @foreach (Cart::instance('wishList')->content() as $item )
                    <li class="col-lg-3 col-md-6 col-sm-6 col-xs-6 ">
                        <div class="product product-style-3 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('product.details',['slug'=>$item->model->slug])}}" title="{{$item->model->name}}">
                                    <figure><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="{{route('product.details',['slug'=>$item->model->slug])}}" class="product-name"><span> {{$item->model->name}}</span></a>
                                <div class="wrap-price"><span class="product-price">{{$item->model->regular_price}}</span></div>
                                <a href="#" class="btn add-to-cart"
                                    wire:click.prevent="store({{$item->model->id}},'{{$item->model->name}}', {{$item->model->regular_price}})"
                                    >Add To Cart</a>
                                <div class="wish-product">
                                    <a href="#"
                                    wire:click.prevent="removeWishList({{$item->model->id}})"
                                    ><i class="fa fa-heart fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @else
                    <h3 class="alert alert-warning">No product in Wish List</h3>

                @endif

            </div>

        </div>
    </div>
</main>
