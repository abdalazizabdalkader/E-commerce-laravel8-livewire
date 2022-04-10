<div>

    <div class="container" style='padding: 30px 0;'>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">All Coupons</div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addcoupon')}}" class="btn btn-success pull-right">Add Coupon</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Code</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                    <th>Cart Value</th>
                                    <th>Expiry Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($coupons as $coupon)
                                    <tr>
                                        <th>{{ $coupon->id }}</th>
                                        <th>{{ $coupon->code }}</th>
                                        @if($coupon->type == 'fixed')
                                            <th>Fixed</th>
                                            <th>${{ $coupon->value }}</th>
                                            @else
                                            <th>Percent</th>
                                            <th>{{ $coupon->value }}%</th>
                                        @endif
                                        <th>{{ $coupon->cart_value }}$</th>
                                        <th>{{ $coupon->expiry_date }}</th>
                                        <th>
                                            <a href="{{route('admin.editcoupon',['coupon_id'=>$coupon->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="#" class="px-10" onclick="confirm('Are you sure, You want to delete this coupon') || event.stopImmediatePropagation()" wire:click.prevent='deleteCoupon({{$coupon->id}})'><i class="fa fa-times fa-2x text-danger ml-12 "></i></a>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
