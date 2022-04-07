<div class="wrap-icon-section wishlist">
    @if (Cart::instance('wishList')->count() > 0)

    <a href="{{route('product.wishlist')}}" class="link-direction">
        <i class="fa fa-heart" aria-hidden="true"></i>
        <div class="left-info">
            <span class="index ">{{Cart::instance('wishList')->count()}} Item</span>
            <span class="title">Wishlist</span>
        </div>
    </a>
    @endif
</div>
