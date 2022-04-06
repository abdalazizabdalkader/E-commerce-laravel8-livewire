<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-heading ">
                    <div class="row">
                        <div class="col-md-6">Manege Home Categories </div>
                    </div>
                   </div>
                   <div class="panel-body">
                        <form action="" class="form-horizontal" wire:submit.prevent='updateHomeCat'>
                            @if (Session::has('message'))
                                <div class="alert alert-success">{{Session::get('message')}}</div>
                            @endif
                            <div class="form-group">
                                    @foreach ($categories as $category)
                                    <div class="col-md-4">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="categories[]" value="{{$category->id}}" wire:model='selected_categories'>
                                            <label class="form-check-label" for="inlineCheckbox1">{{$category->name}}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>



                            <div class="form-group ">
                                <label  class="col-md-4 control-label">Number Of Pproducts</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-md" wire:model='num_of_proucts'>
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
