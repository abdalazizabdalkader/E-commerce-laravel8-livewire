<div class="wrap-icon-section minicart">
    @if (Cart::instance('cart')->count() > 0)

    <a href="{{route('product.cart')}}" class="link-direction">
        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
        <div class="left-info">
            <span class="index">{{Cart::instance('cart')->count()}} Item</span>
            <span class="title">CART</span>
        </div>
    </a>
    @endif
</div>
