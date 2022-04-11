<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hedden {
            display: block !important;
        }

    </style>
    <div class="container" style='padding: 30px 0;'>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">All Orders</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Subtotal</th>
                                    <th>Discount</th>
                                    <th>Tax</th>
                                    <th>Total</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Zipcode</th>
                                    <th>status</th>
                                    <th>Order Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <th>{{$order->id}}</th>
                                        <th>{{$order->subtotal}}</th>
                                        <th>{{$order->discount}}</th>
                                        <th>{{$order->tax}}</th>
                                        <th>{{$order->total}}</th>
                                        <th>{{$order->firstname}}</th>
                                        <th>{{$order->lastname}}</th>
                                        <th>{{$order->mobile}}</th>
                                        <th>{{$order->email}}</th>
                                        <th>{{$order->zipcode}}</th>
                                        <th>{{$order->status}}</th>
                                        <th>{{$order->created_at}}</th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
