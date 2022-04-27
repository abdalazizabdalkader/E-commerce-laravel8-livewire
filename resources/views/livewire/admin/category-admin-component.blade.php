<div>
    <style>
        nav svg {
            height: 20px;
        }

        nav .hedden {
            display: block !important;
        }
        .sclist{
            list-style: none;
        }
    </style>
    <div class="container" style='padding: 30px 0;'>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">All Categories</div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addcategories')}}" class="btn btn-success pull-right">Add Category</a>
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
                                    <th>Category name</th>
                                    <th>Slug</th>
                                    <th>Subcategories</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            <ul class="sclist">
                                                @foreach ($category->subcategory as $subcategory)
                                                    <li>
                                                        <i class="fa fa-caret-right"></i> {{$subcategory->name}}
                                                         <a href="{{route('admin.editcategory',['category_slug'=>$category->slug,'subcategory_slug'=>$subcategory->slug])}}"><i class="fa fa-edit"></i></a>
                                                         <a href="#" onclick="confirm('Are you sure, You want to delete ({{$subcategory->name}}) category') || event.stopImmediatePropagation()" wire:click.prevent='deleletSubcategory({{$subcategory->id}})'><i class="fa fa-times text-danger"></i></a>
                                                     </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <a href="{{route('admin.editcategory',['category_slug'=>$category->slug])}}"><i class="fa fa-edit fa-2x"></i></a>
                                            <a href="#" class="px-10" onclick="confirm('Are you sure, You want to delete ({{$category->name}}) category') || event.stopImmediatePropagation()" wire:click.prevent='deleteCategory({{$category->id}})'><i class="fa fa-times fa-2x text-danger ml-12 "></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
