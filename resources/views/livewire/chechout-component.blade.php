<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>checkout</span></li>
            </ul>
        </div>
    <div class=" main-content-area">
        <form wire:submit.prevent='placeOrder' onsubmit="$('#processing').show();">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrap-address-billing">
                        <h3 class="box-title">Billing Address</h3>
                        <div class="billing-address">
                            <p class="row-in-form">
                                <label for="fname">first name<span>*</span></label>
                                <input type="text" name="fname" value="" placeholder="Your name" wire:model='firstname'>
                                @error('firstname') <span class="text-danger">{{$message}}</span>   @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="lname">last name<span>*</span></label>
                                <input type="text" name="lname" value="" placeholder="Your last name" wire:model='lastname'>
                                @error('lastname') <span class="text-danger">{{$message}}</span>   @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="email">Email Addreess:</label>
                                <input type="email" name="email" value="" placeholder="Type your email" wire:model='email'>
                                @error('email') <span class="text-danger">{{$message}}</span>   @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="phone">Phone number<span>*</span></label>
                                <input type="number" name="phone" value="" placeholder="10 digits format" wire:model='mobile'>
                                @error('mobile') <span class="text-danger">{{$message}}</span>   @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="add">Line 1</label>
                                <input type="text" name="add" value="" placeholder="Street at apartment number" wire:model='line1'>
                                @error('line1') <span class="text-danger">{{$message}}</span>   @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="add">Line 2</label>
                                <input type="text" name="add" value=""placeholder="Street at apartment number" wire:model='line2'>
                                @error('line2') <span class="text-danger">{{$message}}</span>   @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="country">Country<span>*</span></label>
                                <input type="text" name="country" value="" placeholder="United States" wire:model='country'>
                                @error('country') <span class="text-danger">{{$message}}</span>   @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="zip-code">Postcode / ZIP:</label>
                                <input  type="number" name="zip-code" value="" placeholder="Your postal code" wire:model='zipcode'>
                                @error('zipcode') <span class="text-danger">{{$message}}</span>   @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="city">Town / City<span>*</span></label>
                                <input type="text" name="city" value="" placeholder="City name" wire:model='city'>
                                @error('city') <span class="text-danger">{{$message}}</span>   @enderror
                            </p>
                            <p class="row-in-form">
                                <label for="city">province<span>*</span></label>
                                <input  type="text" name="proviince" value="" placeholder="City name" wire:model='province'>
                                @error('province') <span class="text-danger">{{$message}}</span>   @enderror
                            </p>
                            <p class="row-in-form fill-wife">
                                <label class="checkbox-field">
                                    <input name="different-add"  value="1" type="checkbox" wire:model='shipToDifferent'>
                                    <span>Ship to a different address?</span>
                                </label>
                            </p>
                        </div>

                    </div>
                </div>
                @if ($shipToDifferent)
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Billing Address</h3>
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">first name<span>*</span></label>
                                    <input  type="text" name="fname" value="" placeholder="Your name" wire:model='s_firstname'>
                                    @error('s_firstname')  <span class="text-danger">{{$message}}</span>  @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">last name<span>*</span></label>
                                    <input  type="text" name="lname" value="" placeholder="Your last name" wire:model='s_lastname'>
                                    @error('s_lastname')  <span class="text-danger">{{$message}}</span>  @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Addreess:</label>
                                    <input  type="email" name="email" value="" placeholder="Type your email" wire:model='s_email'>
                                    @error('s_email')  <span class="text-danger">{{$message}}</span>  @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input  type="number" name="phone" value="" placeholder="10 digits format" wire:model='s_mobile'>
                                    @error('s_mobile')  <span class="text-danger">{{$message}}</span>  @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line 1</label>
                                    <input  type="text" name="add" value="" placeholder="Street at apartment number" wire:model='s_line1'>
                                    @error('s_line1')  <span class="text-danger">{{$message}}</span>  @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line 2</label>
                                    <input  type="text" name="add" value="" placeholder="Street at apartment number" wire:model='s_line2'>
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Country<span>*</span></label>
                                    <input  type="text" name="country" value="" placeholder="United States" wire:model='s_country'>
                                    @error('s_country')  <span class="text-danger">{{$message}}</span>  @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP:</label>
                                    <input  type="number" name="zip-code" value='' placeholder="Your postal code" wire:model='s_zipcode'>
                                    @error('s_zipcode')  <span class="text-danger">{{$message}}</span>  @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Town / City<span>*</span></label>
                                    <input  type="text" name="city" value="" placeholder="City name" wire:model='s_city'>
                                    @error('s_city')  <span class="text-danger">{{$message}}</span>  @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">province<span>*</span></label>
                                    <input  type="text" name="city" value="" placeholder="City name" wire:model='s_province'>
                                    @error('s_province')  <span class="text-danger">{{$message}}</span>  @enderror
                                </p>
                            </div>

                        </div>
                    </div>
                @endif
            </div>
            <div class="summary summary-checkout">
                <div class="summary-item payment-method">
                    <h4 class="title-box">Payment Method</h4>
                    {{-- @if($paymentMod == 'card')
                        <div class="wrap-address-billing">

                        </div>
                    @endif --}}
                    <div class="choose-payment-methods">
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-bank" value="cod" type="radio" wire:model='paymentMod'>
                            <span>Cash on delivery</span>
                            <span class="payment-desc">Oreder now on delivery</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model='paymentMod' disabled>
                            <span >Dabit / Credit Card </span>
                            <span class="payment-desc">There are many variations of passages of Lorem available</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model='paymentMod' disabled>
                            <span>Paypal</span>
                            <span class="payment-desc">You can pay with your credit</span>
                            <span class="payment-desc">card if you don't have a paypal account</span>
                        </label>
                        @error('methodPayment')  <span class="text-danger">{{$message}}</span>  @enderror
                    </div>
                    @if (Session::has('checkout'))
                    <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">${{Session::get('checkout')['total']}}</span></p>
                    @endif

                    @if ($errors->isEmpty())
                        <div id="processing" wire:ignore style="font-size: 22px;margin-bottom:20px;padding-left:37px;color:green;display:none;">
                            <i class="fa fa-spinner fa-pulse fa-fw"></i>
                            <span>Processing....</span>
                        </div>
                    @endif

                    <button class="btn btn-medium">Place order now</button>
                </div>
                <div class="summary-item shipping-method">
                    <h4 class="title-box f-title">Shipping method</h4>
                    <p class="summary-info"><span class="title">Flat Rate</span></p>
                    <p class="summary-info"><span class="title">Fixed 0$</span></p>

                </div>
            </div>
        </form>


        </div>
        <!--end main content area-->
    </div>
    <!--end container-->

</main>
