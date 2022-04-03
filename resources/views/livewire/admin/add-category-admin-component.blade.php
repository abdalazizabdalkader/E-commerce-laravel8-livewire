<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-heading ">
                    <div class="row">
                        <div class="col-md-6">Add New Category</div>
                        <div class="col-md-6 ">
                            <a href="{{route('admin.categories')}}" class="btn btn-success pull-right">All category</a>
                        </div>
                    </div>
                   </div>
                   <div class="panel-body">
                        <form action="" class="form-horizontal" wire:submit.prevent='storeCategory()'>
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{Session::get('message')}}</div>
                            @endif
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Category name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='name' wire:keyup='generateSlug()'>
                                </div>
                            </div>

                            <div class="form-group hidden">
                                <label  class="col-md-4 control-label">Category Slug</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='slug'>
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