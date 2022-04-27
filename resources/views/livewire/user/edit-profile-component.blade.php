<div class="container" style="padding: 30px 0">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                Profile
            </div>
            <div class="panel-body">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                @endif
                <form wire:submit.prevent='updateProfile'>
                    <div class="row">
                        <div class="col-md-4">
                            @if ($newImg)
                            <img src="{{$newImg->temporaryUrl()}}" width="100%">
                            @elseif ($image)
                            <img src="{{asset('assets/images/profile')}}/{{$image}}" width="100%"
                                height="75%">
                            @else
                            <img src="{{asset('assets/images/profile/default.jpg')}}" width="100%" height="75%">
                            @endif
                            <input type="file" class="form-control" wire:model='newImg'>
                        </div>
                        <div class="col-md-8">
                            <p><b>Name: </b><input type="text" class="form-control" wire:model='name'></p>
                            <p><b>Email: </b>{{$email}}</p>
                            <p><b>Mobile: </b><input type="text" class="form-control" wire:model='mobile'></p>
                            <hr>
                            <p><b>Line1: </b><input type="text" class="form-control" wire:model='line1'></p>
                            <p><b>Line2: </b><input type="text" class="form-control" wire:model='line2'></p>
                            <p><b>City: </b><input type="text" class="form-control" wire:model='city'></p>
                            <p><b>Province: </b><input type="text" class="form-control" wire:model='province'></p>
                            <p><b>country: </b><input type="text" class="form-control" wire:model='country'></p>
                            <p><b>Zipcaode: </b><input type="text" class="form-control" wire:model='zipcode'></p>
                            <button class="btn btn-primary pull-right">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
