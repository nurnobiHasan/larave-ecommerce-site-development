@extends("backend.layout.layout")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center text-capitalize text-info">About Product</h3>
                @if (Session('addproduct'))
                    <div class="alert alert-success text-center text-capitalize">{{Session('addproduct')}}</div>
                @endif
                @if (Session('deleteproduct'))
                    <div class="alert alert-success text-center text-capitalize">{{Session('deleteproduct')}}</div>
                @endif
                <div class="add-product f-right">
                    <a class="btn btn-info text-center text-capitalize" href="{{asset('products')}}/create">Add New Product</a>
                </div>
                @if (Session("productupate"))
                    <div class="alert alert-success text-capitalize text-center mt-3">{{Session("productupate")}}</div>
                @endif
                <table class="table text-center table-dark my-5">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Thumbnail</th>
                        <th scope="col">Product Prize</th>
                        <th scope="col">Product Quantity</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($allproduct as $singleproduct )
                            <tr>
                                <td scope="row">{{$singleproduct->id}}</td>
                                <td scope="row">{{$singleproduct->product_name}}</td>
                                <td scope="row">
                                    @if ($singleproduct->product_thumbnail)
                                        <img with="50" height="50" src="{{Storage::url($singleproduct->product_thumbnail)}}" alt="">
                                    @endif
                                </td>
                                <td scope="row">{{$singleproduct->product_prize}}</td>
                                <td scope="row">{{$singleproduct->product_quantity}}</td>
                                <td>
                                    <a target="_black" class="btn btn-info btn-small" href="{{asset('products')}}/{{$singleproduct->id}}">View</a>
                                    <a class="btn btn-info btn-small" href="{{asset('products')}}/{{$singleproduct->id}}/edit">Edit</a>
                                    <form class=" d-inline" action="{{asset('products')}}/{{$singleproduct->id}}" method="post">
                                        @csrf
                                        @method("delete")
                                        <input onclick="return confirm('r u sure delete category')" class="btn btn-small btn-danger text-capitalize" type="submit" value="Delete">
                                    </form>
                                </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
