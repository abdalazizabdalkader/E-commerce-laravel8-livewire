
    <div class="container" style='padding: 30px 0;'>
        <div class="row">
            <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-heading ">
                    Change Password
                   </div>
                   <div class="panel-body">
                       @if (Session::has('pass_succes'))
                           <div class="alert alert-success">{{Session::get('pass_succes')}}</div>
                       @endif
                       @if (Session::has('pass_error'))
                           <div class="alert alert-danger">{{Session::get('pass_error')}}</div>
                       @endif
                        <form action="" class="form-horizontal" wire:submit.prevent='changePassword'>
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Current Password</label>
                                <div class="col-md-4">
                                    <input type="password" class="form-control input-md" wire:model='current_password' >
                                    @error('current_password') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label  class="col-md-4 control-label" >new Password</label>
                                <div class="col-md-4">
                                    <input type="password" class="form-control input-md" wire:model='password' >
                                    @error('password') <p class="text-danger">{{$message}}</p> @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label  class="col-md-4 control-label" >Password Confirmation</label>
                                <div class="col-md-4">
                                    <input type="password" class="form-control input-md" wire:model='password_confirmation' >
                                    @error('password_confirmation') <p class="text-danger">{{$message}}</p> @enderror
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
