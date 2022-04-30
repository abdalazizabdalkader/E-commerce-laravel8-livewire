<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Shop</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="{{asset('assets/images/shop-banner.jpg')}}" alt=""></figure>
                    </a>
                </div>

                <div class="wrap-shop-control">

                    <h1 class="shop-title">All Categories</h1>

                    <div class="wrap-right">

                        <div class="sort-item orderby ">
                            <select name="orderby" class="use-chosen" wire:model='sorting'>
                                <option value="default" selected="selected">Default sorting</option>
                                <option value="date">Sort by newness</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div>

                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" wire:model='sizePage' >
                                <option value="12" selected="selected">12 per page</option>
                                <option value="16">16 per page</option>
                                <option value="18">18 per page</option>
                                <option value="21">21 per page</option>
                                <option value="24">24 per page</option>
                                <option value="30">30 per page</option>
                                <option value="32">32 per page</option>
                            </select>
                        </div>



                    </div>

                </div><!--end wrap shop control-->
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
                    <ul class="product-list grid-products equal-container">
                        @php
                            $wishItem = Cart::instance('wishList')->content()->pluck('id');
                        @endphp
                        @foreach ($products as $product )
                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{route('product.details',['slug'=>$product->slug])}}" title="{{$product->name}}">
                                        <figure><img src="{{asset('assets/images/products')}}/{{$product->image}}" alt="{{$product->name}}"></figure>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <a href="{{route('product.details',['slug'=>$product->slug])}}" class="product-name"><span> {{$product->name}}</span></a>
                                    <div class="wrap-price"><span class="product-price">{{$product->regular_price}}</span></div>
                                    <a href="#" class="btn add-to-cart"
                                        wire:click.prevent="store({{$product->id}},'{{$product->name}}', {{$product->regular_price}})"
                                        >Add To Cart</a>
                                    <div class="wish-product">
                                        @if ($wishItem->contains($product->id))
                                        <a href="#"
                                        wire:click.prevent="removeWishList({{$product->id}})"
                                        ><i class="fa fa-heart fill"></i></a>
                                        @else
                                        <a href="#"
                                        wire:click.prevent="addWishList({{$product->id}},'{{$product->name}}', {{$product->regular_price}})"
                                        ><i class="fa fa-heart"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                </div>

                <div class="wrap-pagination-info">

                    {!!$products->links()!!}
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">All Categories</h2>
                    <div class="widget-content">
                        <ul class="list-category">
                            @foreach ($categories as $category )
                            <li class="category-item {{count($category->subcategory) > 0 ? 'has-child-cate' : ''}}">
                                <a href="{{route('product.category',['category_slug'=> $category->slug])}}"
                                    class="cate-link">{{$category->name}}</a>
                                    @if(count($category->subcategory) > 0)
                                        <span class="toggle-control">+</span>
                                        <ul class="sub-cate">
                                            @foreach ($category->subcategory as $scategory )
                                                <li class="category-item">
                                                    <a href="{{route('product.category',['category_slug'=>$category->slug,'subcategory_slug'=>$scategory->slug])}}" class="cat-link"><i class="fa fa-caret-right"></i> {{$scategory->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif

                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- Categories widget-->




                <div class="widget mercado-widget filter-widget price-filter">
                    <h2 class="widget-title">Price
                         <span class="text-info">${{$min_price_filter}} - ${{$max_price_filter}}</span>
                        </h2>
                    <div class="widget-content" style="padding: 10px 5px 40px 5px">
                        <div id="slider" wire:ignore></div>
                    </div>
                </div><!-- Price-->


            </div><!--end sitebar-->

        </div><!--end row-->

    </div><!--end container-->

</main>

@push('scripts')
    <script>
        var slider = document.getElementById('slider');
        noUiSlider.create(slider,{
            start : [1,1000],
            connect : true,
            range : {
                'min' : 1,
                'max' : 1000
            },
            pips:{
                mode:'step',
                stepped :true,
                density : 4
            }
        });

        slider.noUiSlider.on('update',function(value){
            @this.set('min_price_filter',value[0]);
            @this.set('max_price_filter',value[1]);
        });
    </script>
@endpush
