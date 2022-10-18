@extends("backend.layout.layout")
@section("content")
   <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <h4 class="text-center text-capitalize text-info pb-4">Add Product</h4>
                <form action="{{asset('products')}}/{{$singleproduct->id}}" method="post" enctype="multipart/form-data" class="py-5">
                    @csrf
                    @if (isset($singleproduct->id))
                        @method("put")
                    @endif
                    <label for="product_name" class="text-info text-capitalize"><p>Product Name:</p></label>
                    @error("product_name")
                        <div class="alert alert-danger text-capitalize text-center">{{$message}}</div>
                    @enderror
                    <input class="form-control @error("product_name")
                        is-invalid
                    @enderror" value="{{old('product_name',$singleproduct->product_name)}}" type="text" name="product_name" id="product_name" placeholder="write product name...."><br>


                    <label for="category_name" class="text-info text-capitalize"><p>Category Name:</p></label>
                    <select name="category_name" class="form-control" id="category_name">
                        @if (!isset($singleproduct->id))
                            <option value="">Select Category</option>
                        @endif

                        @foreach ($allcategory as $singlecategory)
                            <option @if ($singlecategory->id == $singleproduct->category_id) selected @endif value="{{$singlecategory->id}}">{{$singlecategory->name}}</option>
                        @endforeach
                    </select><br />


                    <label for="subcategory_name" class="text-info text-capitalize"><p>Sub Category Name:</p></label>
                    <select name="subcategory_name" class="form-control" id="subcategory_name">
                        @if (!isset($singleproduct->id))
                         <option value="">Select Sub Category</option>
                        @endif

                        @foreach ($allsubcategory as $singlesubcategory)

                            <option @if ($singlesubcategory->id == $singleproduct->subcategory_id)
                                selected
                            @endif value="{{$singlesubcategory->id}}">{{$singlesubcategory->name}}</option>
                        @endforeach
                    </select><br>


                    <label for="slug_name" class="text-info text-capitalize"><p>Slug Name:</p></label>
                    <input value="{{old('slug_name',$singleproduct->slug)}}" class="form-control" type="text" name="slug_name" id="slug_name" placeholder="write slug name...."><br>

                    <label for="product_summery" class="text-info text-capitalize"><p>Product Summery:</p></label>
                    @error("product_summery")
                        <div class="alert alert-danger text-capitalize text-center">{{$message}}</div>
                    @enderror
                    <textarea name="product_summery" id="product_summery" class="form-control @error("product_summery")
                       is-invalid
                    @enderror">
                    {{$singleproduct->product_summery}}
                    </textarea>

                    <label for="product_description" class="text-info text-capitalize"><p>Product Description:</p></label>
                    <textarea name="product_description" id="product_description" class="form-control">
                        {{$singleproduct->product_description}}
                    </textarea>

                    <label for="product_prize" class="text-info text-capitalize"><p>Product Prize:</p></label>
                    @error("product_prize")
                        <div class="alert alert-danger text-capitalize text-center">{{$message}}</div>
                    @enderror
                    <input value="{{old('product_prize',$singleproduct->product_prize)}}" class="form-control @error("product_prize")
                       is-invalid
                    @enderror" type="text" value="{{old('product_prize')}}" name="product_prize" id="product_prize" placeholder="write product prize...."><br>

                    <label for="product_quantity" class="text-info text-capitalize"><p>Product Quantity:</p></label>
                    @error("product_quantity")
                        <div class="alert alert-danger text-capitalize text-center">{{$message}}</div>
                    @enderror
                    <input value="{{old('product_quantity',$singleproduct->product_quantity)}}"  class="form-control @error("product_quantity")
                        is-invalid
                    @enderror" value="{{old('product_quantity')}}" type="text" name="product_quantity" id="product_quantity" placeholder="write product quantity...."><br>

                    <label for="product_photo" class="text-info text-capitalize"><p>Product Photo:</p></label>
                    @if ($singleproduct->product_thumbnail)
                        <img class="my-3" width="70" height="70" src="{{Storage::url($singleproduct->product_thumbnail)}}" alt="">
                    @endif
                    <input class="form-control" type="file" name="product_photo" id="product_photo" ><br>
                    <label for="product_gallery" class="text-info text-capitalize"><p>Product Gallery:</p></label>
                    <input class="form-control" multiple type="file" name="product_gallery[]" id="product_gallery" ><br>
                    @if ($singleproduct->id)
                        <input class="btn btn-success text-capitalize" type="submit" value="update Product">
                      @else
                      <input class="btn btn-success text-capitalize" type="submit" value="add Product">
                    @endif
                </form>
            </div>
        </div>
   </div>
@endsection
