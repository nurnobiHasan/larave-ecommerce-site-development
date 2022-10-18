@extends("backend.layout.layout")
@section("content")
   <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h4>add new Sub Category</h4>
                <form class="my-5" action="{{asset('/addsubcategorystore')}}" method="post">

                    @if (isset($editdata->id))
                        @method("put")
                    @endif
                    @csrf
                    <label class="text-center text-info mb-2" for="name"><h5>Sub Category Name:</h5></label>
                    @error("name")
                        <p class="text-danger text-capitalize">{{$message}}</p>
                    @enderror
                    <input value="{{old('name',$editdata->name)}}" type="text" name="name" id="name" placeholder="write sub category name...." class="form-control @error("name")
                        is-invalid
                    @enderror">
                    <label for="subcat" class="text-info mt-2"><h5>Select Category</h5></label>
                    @error("subcategoryname")
                        <p class="text-danger text-capitalize">{{$message}}</p>
                    @enderror
                    <select name="subcategoryname" value="{{old('subcategoryname')}}" id="subcat" class="form-control mt-2 @error("subcategoryname")
                        is-invalid
                    @enderror">
                        <option value="">Select Category</option>
                        @foreach ($categorydata as $singlesubcategory)
                            <option value="{{$singlesubcategory->id}}">{{$singlesubcategory->name}}</option>
                        @endforeach


                    </select>
                    <input type="submit" value="submit" name="submit" class="btn btn-success mt-3 text-capitalie">
                </form>
            </div>
        </div>
   </div>
@endsection
