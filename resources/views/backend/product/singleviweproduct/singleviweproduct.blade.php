@extends("backend.layout.layout")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h4 class="text-center text-capitalize text-info pb-4">Single Product View:</h4>
                <a class="btn btn-primary text-capitalize text-center" href="{{asset('products')}}">Go Back</a>
                <table class="table text-center table-dark my-5">
                    <thead>
                        <tr>
                            <th scope="col">Product Id:</th>
                            <td>{{$singleproduct->id}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Product Name:</th>
                            <td>{{$singleproduct->product_name}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Category Name:</th>
                            <td>{{$singleproduct->category->name}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Sub-Category Name:</th>
                            <td>{{$singleproduct->subcategory->name}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Product Slug:</th>
                            <td>{{$singleproduct->slug}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Product Summary:</th>
                            <td>{{Str::limit($singleproduct->product_summery,60)}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Product Description:</th>
                            <td>{{Str::limit($singleproduct->product_description,120)}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Product Prize:</th>
                            <td>{{$singleproduct->product_prize}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Product Quantity:</th>
                            <td>{{$singleproduct->product_quantity}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Product Created:</th>
                            <td>{{$singleproduct->created_at}}</td>
                        </tr>
                        <tr>
                            <th scope="col">Product Updated:</th>
                            <td>{{$singleproduct->updated_at}}</td>
                        </tr>
                        <tr>
                            <th>Product Photo</th>
                            <td>
                               @if (isset($singleproduct->product_thumbnail))
                                    <img class="my-3" width="70" height="70" src="{{$singleproduct->product_thumbnail}}" alt="">
                               @endif
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
