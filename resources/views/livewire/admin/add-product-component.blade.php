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
                       @if (Session::has('message'))
                           <div class="alert alert-success">{{Session::get('message')}}</div>
                       @endif
                        <form action="" class="form-horizontal" wire:submit.prevent='addProduct'>
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
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control" id="short_description" wire:model='short_description'></textarea>
                                    @error('short_description')  <p class="text-danger">{{$message}}</p>  @enderror
                                </div>
                            </div>
                            <div class="form-group ">
                                <label  class="col-md-4 control-label"> Description</label>
                                <div class="col-md-4" wire:ignore>
                                    <textarea class="form-control" id="description" wire:model='description'></textarea>
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
                                    <select class="form-control" wire:model='stock'>
                                        <option value="instock">in stock</option>
                                        <option value="outofstock">out of stock</option>
                                    </select>
                                    @error('stock')  <p class="text-danger">{{$message}}</p>  @enderror
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
                                <label  class="col-md-4 control-label" >Category</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model='category_id' wire:change='changeSubcategory'>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    @error('categoty_id')  <p class="text-danger">{{$message}}</p>  @enderror

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="col-md-4 control-label" >SubCategory</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model='subcategory_id'>
                                        <option value="0">Select SubCategory</option>
                                        @foreach ($subcategories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Image</label>
                                <div class="col-md-4">
                                    <input type="file" class=" input-file" wire:model='image'>
                                    @if ($image)
                                        <img src="{{$image->temporaryUrl()}}" width="120" alt="">
                                    @endif
                                    @error('image')  <p class="text-danger">{{$message}}</p>  @enderror

                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Images Galary</label>
                                <input type="file" class=" input-file col-md-4" wire:model='images' multiple>
                                <div class="col-md-12">
                                    @if ($images)
                                        @foreach ($images as$image )
                                        <img src="{{$image->temporaryUrl()}}" width="120" alt="">
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Attribute Product</label>
                                <div class="col-md-3">
                                    <select class="form-control" wire:model='attr'>
                                        <option value="0">Select Attribute</option>
                                        @foreach ($productAttrs as $attr)
                                        <option value="{{$attr->id}}">{{$attr->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-info" wire:click.prevent='addAttr'>Add</button>
                                </div>
                            </div>

                            @foreach ($inputs as $key=>$value)
                                <div class="form-group ">
                                    <label  class="col-md-4 control-label">{{$productAttrs->where('id', $attribute_arr[$key])->first()->name}}</label>
                                    <div class="col-md-3">
                                        <input type="text" class="form-control input-md" placeholder="{{$productAttrs->where('id', $attribute_arr[$key])->first()->name}}" wire:model='attribute_values.{{$value}}' >
                                    </div>
                                    <div class="col-md-1">
                                        <button class="btn btn-danger btn-sm" wire:click.prevent='removeAttr({{$key}})'>Remove</button>
                                    </div>
                                </div>
                            @endforeach
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
{{-- {{dd($short_description)}} --}}
@push('scripts')
    <script>
        $(function(){
            tinymce.init({
                selector: '#short_description',
                setup:function(editor){
                    editor.on('change',function(e){
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description',sd_data);
                    });
                }
            });

            tinymce.init({
                selector: '#description',
                setup:function(editor){
                    editor.on('change',function(e){
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description',d_data);
                    });
                }
            });
        });
    </script>

@endpush
