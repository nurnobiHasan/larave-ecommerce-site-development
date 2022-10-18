@extends("backend.layout.layout")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">

                @if (Session("subcategory"))
                    <div class="alert alert-success text-center text-capitalize">{{Session("subcategory")}}</div>
                @endif
                @if (Session("updatesubcategory"))
                    <div class="alert alert-success text-center">{{Session("updatesubcategory")}}</div>
                @endif
                @if (Session('subcategorydeleted'))
                    <div class="alert alert-success text-center text-capitalize">{{Session('subcategorydeleted')}}</div>
                @endif
                <a style="float:right" class="btn btn-primary mb-3" href="{{asset('/addsubcategory')}}">Add Sub Category</a>
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th class="text-center">Category Name</th>
                            <th class="text-center">Sub Category Name</th>
                            <th class="text-center">Category Action</th>
                        </tr>
                         @foreach ($viewsubcategory as $singlesubcategory )
                            <tr>
                                <td class="text-center">{{$singlesubcategory->category->name?$singlesubcategory->category->name:"N/a"}}</td>
                                <td class="text-center text-capitalize">{{$singlesubcategory->name}}</td>
                                <td class="text-center text-capitalize">
                                    <a class="btn btn-info text-capitalize" href="{{asset('editcategory')}}/{{$singlesubcategory->id}}">Edit</a>
                                    <form action="{{asset('deletesubcategory')}}/{{$singlesubcategory->id}}" method="post" class="d-inline-block">
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
