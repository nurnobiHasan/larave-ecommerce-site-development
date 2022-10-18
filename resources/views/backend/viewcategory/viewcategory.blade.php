@extends("backend.layout.layout")
@section("content")
   <div class="content">
        <div class="col-md-8 offset-2">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                    <a style="float:right" class="btn btn-success text-capitalize" href="{{asset('category/create')}}">Add Category</a>
                </div>
                @if (Session("addcategory"))
                    <div class="alert alert-success text-capitalize text-center ">{{Session("addcategory")}}</div>
                @endif
                @if (Session("updatecategory"))
                    <div class="alert alert-success text-center text-capitalize">{{Session("updatecategory")}}</div>
                @endif
                @if (Session('categorydelete'))
                    <div class="alert alert-success text-center">{{Session('categorydelete')}}</div>
                @endif
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th class="text-center">Category Id</th>
                            <th class="text-center">Category Name</th>
                            <th class="text-center">Category Action</th>
                        </tr>
                        @foreach ($viewcategory  as $singleview )
                            <tr>
                                <td class="text-center">{{$singleview->id}}</td>
                                <td class="text-center text-capitalize">{{$singleview->name}}</td>
                                <td class="text-center text-capitalize">
                                    <a class="btn btn-info text-capitalize" href="{{url('category')}}/{{$singleview->id}}/edit">Edit</a>
                                    <form action="{{asset('category')}}/{{$singleview->id}}" method="post" class="d-inline-block">
                                        @csrf
                                        @method("delete")
                                        <input onclick="return confirm('r u sure delete this??')" class="btn btn-danger text-capitalize" type="submit" value="delete">

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </thead>
                </table>
            </div>

        </div>
   </div>
@endsection
