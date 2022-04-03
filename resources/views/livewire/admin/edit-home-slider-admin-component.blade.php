<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-heading ">
                    <div class="row">
                        <div class="col-md-6">Edit {{$title}} HomeSlider</div>
                        <div class="col-md-6 ">
                            <a href="{{route('admin.homeslider')}}" class="btn btn-success pull-right">All sliders</a>
                        </div>
                    </div>
                   </div>
                   <div class="panel-body">
                        <form action="" class="form-horizontal" wire:submit.prevent='updateSlider'>
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{Session::get('message')}}</div>
                            @endif
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Title</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='title' >
                                </div>
                            </div>

                            <div class="form-group ">
                                <label  class="col-md-4 control-label">Subtitle</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='sub_title' >
                                </div>
                            </div>
                            <div class="form-group ">
                                <label  class="col-md-4 control-label">Price</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='price' >
                                </div>
                            </div>
                            <div class="form-group ">
                                <label  class="col-md-4 control-label"> Link</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='link' >
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Status</label>
                                <div class="col-md-4">
                                    <select class="form-control" wire:model='status'>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Image</label>
                                <div class="col-md-4">
                                    <input type="file" class=" input-file" wire:model='new_image'>
                                    @if ($new_image)
                                        <img src="{{$new_image->temporaryUrl()}}" width="120" alt="">
                                        @else
                                        <img src="{{asset('assets/images/sliders')}}/{{$image}}" width="120" alt="">

                                    @endif
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
