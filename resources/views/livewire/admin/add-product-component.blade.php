<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-heading ">
                    <div class="row">
                        <div class="col-md-6">Add New Product</div>
                        <div class="col-md-6 ">
                            <a href="{{route('admin.product')}}" class="btn btn-success pull-right">All Product</a>
                        </div>
                    </div>
                   </div>
                   <div class="panel-body">
                        <form action="" class="form-horizontal" wire:submit.prevent='addProduct'>
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{Session::get('message')}}</div>
                            @endif
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Product name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='name' wire:keyup='generateSlug'>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label  class="col-md-4 control-label">Product Slug</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='slug' >
                                </div>
                            </div>
                            <div class="form-group ">
                                <label  class="col-md-4 control-label">Short Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" wire:model='short_description'></textarea>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label  class="col-md-4 control-label"> Description</label>
                                <div class="col-md-4">
                                    <textarea class="form-control" wire:model='description'></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Regular Price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='regular_price' >
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Sale Price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='sale_price'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >SKU</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='SKU'>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Stock</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model='stock'>
                                        <option value="instock">in stock</option>
                                        <option value="outofstock">out of stock</option>
                                    </select>
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
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Image</label>
                                <div class="col-md-4">
                                    <input type="file" class=" input-file" wire:model='image'>
                                    @if ($image)
                                        <img src="{{$image->temporaryUrl()}}" width="120" alt="">
                                    @endif
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
