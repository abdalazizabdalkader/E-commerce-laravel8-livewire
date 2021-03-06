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
                            <div class="col-md-4">All products</div>
                            <div class="col-md-4">
                                <a href="{{route('admin.addproduct')}}" class="btn btn-success pull-right">Add Product</a>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Search..." wire:model='searchTerm'>
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
                                    <th>ID</th>
                                    <th>Imag</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Regular Price</th>
                                    <th>Sale Price</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <th>{{ $product->id }}</th>
                                        <th><img src="{{asset('assets/images/products')}}/{{ $product->image }}" alt="{{ $product->image }}" width="60"></th>
                                        <th>{{ $product->name }}</th>
                                        <th>{{ $product->stoch_status }}</th>
                                        <th>{{ $product->regular_price }}</th>
                                        <th>{{ $product->sale_price }}</th>
                                        <th>{{ $product->category->name}}</th>
                                        <th>{{ $product->created_at }}</th>
                                        <th>
                                            <a href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}"><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="#" class="px-10" onclick="confirm('Are you sure, You want to delete ({{$product->name}}) category') || event.stopImmediatePropagation()"  wire:click.prevent='deleteProduct({{$product->id}})'><i class="ml-12 fa fa-times fa-2x text-danger "></i></a>
                                        </th>
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
