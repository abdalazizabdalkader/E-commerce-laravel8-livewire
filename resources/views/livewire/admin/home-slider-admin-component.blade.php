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
                            <div class="col-md-6">All Sliders</div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addhomeslider')}}" class="btn btn-success pull-right">Add Home Slider</a>
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
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Price</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($homeSliders as $homeSlider)
                                    <tr>
                                        <th>{{ $homeSlider->id }}</th>
                                        <th><img src="{{asset('assets/images/sliders')}}/{{ $homeSlider->image }}" alt="{{$homeSlider->title}}" width="120"></th>
                                        <th>{{ $homeSlider->title }}</th>
                                        <th>{{ $homeSlider->sub_title }}</th>
                                        <th>{{ $homeSlider->price }}</th>
                                        <th>{{ $homeSlider->link }}</th>
                                        <th>{{ $homeSlider->status ? 'Active':'Inactive' }}</th>
                                        <th>{{ $homeSlider->static ? 'static':'In slider' }}</th>
                                        <th>
                                            <a href="{{route('admin.edithomeslider',['slide_id'=>$homeSlider->id ])}}"><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="#" class="px-10" wire:click.prevent='deleteSlider({{$homeSlider->id }})'><i class="fa fa-times fa-2x text-danger ml-12 "></i></a>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- {{ $categories->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
