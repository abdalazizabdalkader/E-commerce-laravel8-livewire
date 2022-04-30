<div class="container" style='padding: 30px 0;'>
    {{-- order Details --}}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">Order Details</div>
                        <div class="col-md-6"><a href="{{route('admin.orders')}}" class="btn btn-success btn-sm pull-right">All Order</a></div>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Order Id</th>
                            <td>{{$order->id}}</td>
                            <th>Order Date</th>
                            <td>{{$order->created_at}}</td>
                            <th>Order Status</th>
                            <td>{{$order->status}}</td>
                            @if ($order->status == 'canseled')
                                <th>Canceled Date</th>
                                <td>{{$order->canceled_date}}</td>
                            @elseif ($order->status == 'delivered')
                                <th>Deliered Date</th>
                                <td>{{$order->Delivered_date}}</td>
                            @endif
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Item Details  --}}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Order Items</div>
                <div class="panel-body">
                    <div class="wrap-iten-in-cart">
                        <h3 class="box-title">Products Name</h3>

                        <ul class="products-cart">
                            {{-- {{dd($orderDetails)}} --}}
                            @foreach ($order->orderItem as $item )
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{asset('assets/images/products')}}/{{$item->product->image}}"
                                                alt="" ></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product"
                                            href="{{route('product.details',['slug'=>$item->product->slug])}}">{{$item->product->name}}</a>
                                    </div>

                                    @if($item->options)
                                        <div class="product-name">
                                            @foreach (unserialize($item->options) as $key=>$value )
                                                <p><b>{{$key}}: {{$value}}</b></p>
                                            @endforeach
                                        </div>
                                    @endif

                                    <div class="price-field produtc-price">
                                        <p class="price">${{$item->price}}</p>
                                    </div>
                                    <div class="quantity">
                                        <h4>{{$item->quantity}}</h4>
                                    </div>
                                    <div class="price-field sub-total">
                                        <p class="price">${{$item->price * $item->quantity}}</p>
                                    </div>
                                    {{-- <div class="delete">
                                        <a class="btn btn-delete" wire:click.prevent="destroy('{{$item->rowId}}')">
                                            <span>Remove From Save Later</span>
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </a>
                                    </div> --}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="summary">
                        <h4 class="title-box">Order Summary</h4>
                        <div class="order-summary">
                    <p class="summary-info total-info "><span class="title">Subtotal</span><b class="index">${{$order->subtotal}}</b></p>
                    <p class="summary-info total-info "><span class="title">Tax</span><b class="index">${{$order->tax}}</b></p>
                    <p class="summary-info total-info "><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                    <p class="summary-info total-info "><span class="title">Total</span><b class="index">${{$order->total}}</b></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Billing Details --}}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <h5 class="col-md-12">Billing Details</h5>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>First Name</th>
                            <td>{{$order->firstname}}</td>
                            <th>Last Name</th>
                            <td>{{$order->lastname}}</td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td>{{$order->mobile}}</td>
                            <th>Email</th>
                            <td>{{$order->email}}</td>
                        </tr>
                        <tr>
                            <th>Line 1</th>
                            <td>{{$order->line1}}</td>
                            <th>Line 2</th>
                            <td>{{$order->line2}}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{$order->city}}</td>
                            <th> Province</th>
                            <td>{{$order->province}}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{$order->country}}</td>
                            <th>Zipcode</th>
                            <td>{{$order->zipcode}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if($order->is_shipping_different)
    {{-- Shippin Details --}}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <h5 class="col-md-12">Shipping Details</h5>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>First Name</th>
                            <td>{{$order->shipping->firstname}}</td>
                            <th>Last Name</th>
                            <td>{{$order->shipping->lastname}}</td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td>{{$order->shipping->mobile}}</td>
                            <th>Email</th>
                            <td>{{$order->shipping->email}}</td>
                        </tr>
                        <tr>
                            <th>Line 1</th>
                            <td>{{$order->shipping->line1}}</td>
                            <th>Line 2</th>
                            <td>{{$order->shipping->line2}}</td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td>{{$order->shipping->city}}</td>
                            <th> Province</th>
                            <td>{{$order->shipping->province}}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{$order->shipping->country}}</td>
                            <th>Zipcode</th>
                            <td>{{$order->shipping->zipcode}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif


    {{-- Transaction Details --}}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <h5 class="col-md-12">Transaction Details</h5>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th>Transaction mode</th>
                            <td>{{$order->transaction->mode}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{$order->transaction->status}}</td>
                        </tr>
                        <tr>
                            <th>Transaction Date</th>
                            <td>{{$order->transaction->created_at}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
