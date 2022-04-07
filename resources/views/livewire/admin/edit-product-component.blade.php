<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-heading ">
                    <div class="row">
                        <div class="col-md-6">Edit Product</div>
                        <div class="col-md-6 ">
                            <a href="{{route('admin.product')}}" class="btn btn-success pull-right">All Product</a>
                        </div>
                    </div>
                   </div>
                   <div class="panel-body">
                       @if (Session::has('message'))
                           <div class="alert alert-success">{{Session::get('message')}}</div>
                       @endif
                        <form action="" class="form-horizontal" wire:submit.prevent='updateProduct'>

                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Product name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='name' wire:keyup='generateSlug'>
                                    @error('name')  <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>

                            <div class="form-group ">
                                <label  class="col-md-4 control-label">Product Slug</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='slug' >
                                    @error('slug')  <p class="text-danger">{{$message}}</p>  @enderror

                                </div>
                            </div>
                            <div class="form-group ">
                                <label  class="col-md-4 control-label">Short Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" wire:model='short_description'></textarea>
                                    @error('short_description')  <p class="text-danger">{{$message}}</p>  @enderror

                                </div>
                            </div>
                            <div class="form-group ">
                                <label  class="col-md-4 control-label"> Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" wire:model='description'></textarea>
                                    @error('description')  <p class="text-danger">{{$message}}</p>  @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Regular Price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='regular_price' >
                                    @error('regular_price')  <p class="text-danger">{{$message}}</p>  @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Sale Price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='sale_price'>
                                    @error('sale_price')  <p class="text-danger">{{$message}}</p>  @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >SKU</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='SKU'>
                                    @error('SKU')  <p class="text-danger">{{$message}}</p>  @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Stock</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model='stock_status'>
                                        <option value="instock">in stock</option>
                                        <option value="outofstock">out of stock</option>
                                    </select>
                                    @error('stock_status')  <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Featured</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model='featured'>
                                        <option value="0">NO</option>
                                        <option value="1">YES</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Quantity</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='quantity'>
                                    @error('quantity')  <p class="text-danger">{{$message}}</p>  @enderror

                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Image</label>
                                <div class="col-md-4">
                                    <input type="file" class=" input-file" wire:model='new_image'>
                                    @if ($new_image)
                                        <img src="{{$new_image->temporaryUrl()}}" width="120" alt="">
                                    @else
                                    <img src="{{asset('assets/images/products')}}/{{$image}}" width="120" alt="">
                                    @endif
                                    @error('new_image')  <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Category</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model='category_id'>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    @error('category_id')  <p class="text-danger">{{$message}}</p>  @enderror

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                   </div>
               </div>
            </div>
        </div>
    </div>
</div>
