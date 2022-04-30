<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Cart</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <div class="wrap-iten-in-cart">
                @if (Session::has('success_message'))
                <div class="alert alert-success">
                    {{Session::get('success_message')}}
                </div>
                @endif
                @if (Cart::instance('cart')->count() > 0)
                <h3 class="box-title">Products Name</h3>
                <ul class="products-cart">
                    @foreach (Cart::instance('cart')->content() as $item )
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="">
                            </figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product"
                                href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
                        </div>
                        @foreach ($item->options as $key=>$value )
                        <div style="virtical-align:middel; width:180px;">
                            <p><b>{{$key}}: {{$value}}</b></p>
                        </div>

                        @endforeach
                        <div class="price-field produtc-price">
                            <p class="price">${{$item->model->regular_price}}</p>
                        </div>
                        <div class="quantity">
                            <div class="quantity-input">
                                <input type="text" name="product-quatity" value="{{$item->qty}}" data-max="120"
                                    pattern="[0-9]*">
                                <a class="btn btn-increase"
                                    wire:click.prevent="increaseQuantity('{{$item->rowId}}')"></a>
                                <a class="btn btn-reduce" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a>
                            </div>
                            <div class='text-center'><a wire:click.prevent='moveToSaveLater("{{$item->rowId}}")'>Save
                                    For Later</a></div>
                        </div>
                        <div class="price-field sub-total">
                            <p class="price">${{$item->subtotal}}</p>
                        </div>
                        <div class="delete">
                            <a class="btn btn-delete" wire:click.prevent="destroy('{{$item->rowId}}')">
                                <span>Remove From Save Later</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Order Summary</h4>
                    <p class="summary-info"><span class="title">Subtotal</span><b
                            class="index">${{Cart::instance('cart')->subtotal()}}</b></p>
                    @if (Session::has('coupon'))
                    <p class="summary-info"><span class="title">Discount ({{Session::get('coupon')['code']}})<a
                                wire:click.prevent='removeDiscount'><i
                                    class="fa fa-times  text-danger "></i></a></span><b
                            class="index">${{number_format($discount, 2)}}</b></p>
                    <p class="summary-info"><span class="title">Subtotal With Discount</span><b
                            class="index">${{number_format($subtotalAfterDiscount, 2)}}</b></p>
                    <p class="summary-info"><span class="title">Tax ({{config('cart.tax')}}%)</span><b
                            class="index">${{number_format($taxAfterDiscount, 2)}}</b></p>
                    <p class="summary-info total-info"><span class="title">Total</span><b
                            class="index">${{number_format($TotalAfterDiscount, 2)}}</b></p>
                    @else
                    <p class="summary-info"><span class="title">Tax</span><b
                            class="index">${{Cart::instance('cart')->tax()}}</b></p>
                    <p class="summary-info total-info "><span class="title">Total</span><b
                            class="index">${{Cart::instance('cart')->total()}}</b></p>
                    {{-- <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b>
                    </p> --}}
                    @endif
                </div>
                <hr>
                @if (!Session::has('coupon'))
                <div class="checkout-info">
                    <label class="checkbox-field">
                        <input class="frm-input " name="have-code" id="have-code" value="1" type="checkbox"
                            wire:model='haveCouponCode'><span>I have Coupon code</span>
                    </label>
                    @if ($haveCouponCode == 1)
                    <div class="summary-item">
                        <form wire:submit.prevent='applyCouponCode'>
                            <h4 class="title-box">Coupon Code</h4>
                            @if (Session::has('message'))
                            <div class="alert alert-danger"> {{Session::get('message')}}</div>
                            @endif
                            <p class="row-in-form">
                                <label for="coupon-code">Enter Your Coupon Code</label>
                                <input type="text" name="coupon-code" wire:model='couponCode'>
                            </p>
                            <button class="btn btm-small">Apply Coupon</button>
                        </form>
                    </div>
                    @endif
                    <a class="btn btn-checkout" href="#" wire:click.prevent='checkout'>Check out</a>
                    <a class="link-to-shop" href="/shop">Continue Shopping<i class="fa fa-arrow-circle-right"
                            aria-hidden="true"></i></a>
                </div>
                @endif

                <div class="update-clear">
                    <a class="btn btn-clear" wire:click.prevent="destroyAll()">Clear Shopping Cart</a>
                    <a class="btn btn-update" href="/cart">Update Shopping Cart</a>
                </div>
            </div>
            @else
            <div class="text-center">
                <h1>Your Cart is empty!</h1>
                <p>Add item to it now!</p>
                <a href="/shop" class="btn btn-success">Shop now</a>
            </div>
            @endif

            {{-- save later --}}
            <div class="wrap-iten-in-cart ">
                @if (Session::has('success_msg'))
                <div class="alert alert-success">
                    {{Session::get('success_msg')}}
                </div>
                @endif
                @if (Cart::instance('savelater')->count() > 0)
                <h4 class="title-box"> Save For Later</h4>
                <ul class="products-cart">
                    @foreach (Cart::instance('savelater')->content() as $item )
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="">
                            </figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product"
                                href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
                        </div>
                        <div class="price-field produtc-price">
                            <p class="price">${{$item->model->regular_price}}</p>
                        </div>
                        <div class="quantity">

                            <div class='text-center'><a
                                    wire:click.prevent='moveFromSaveLaterToCart("{{$item->rowId}}")'>Add to Cart</a>
                            </div>
                        </div>
                        <div class="price-field sub-total">
                            <p class="price">${{$item->subtotal}}</p>
                        </div>
                        <div class="delete">
                            <a class="btn btn-delete" wire:click.prevent="removeFromSaveLater('{{$item->rowId}}')">
                                <span>Delete from your cart</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>


            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Most Popular Products</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                        data-loop="false" data-nav="true" data-dots="false"
                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                        @foreach ($popular_products as $p_product )
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('product.details',['slug'=>$p_product->slug])}}"
                                    title="{{$p_product->name}}">
                                    <figure><img src="{{asset('assets/images/products')}}/{{$p_product->image}}"
                                            width="214" height="214" alt="{{$p_product->name}}"></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="{{route('product.details',['slug'=>$p_product->slug])}}"
                                    class="product-name"><span>{{$p_product->name}}</span></a>
                                <div class="wrap-price"><span class="product-price">{{$p_product->regular_price}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!--End wrap-products-->
                </div>
            </div>
            <!--end main content area-->
        </div>
        <!--end container-->

</main>
