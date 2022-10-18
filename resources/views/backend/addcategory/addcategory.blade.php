@extends("backend.layout.layout")
@section("content")
   <div class="container">
        <div style="border-radius:10px" class="col-md-6 offset-3 bg-secondary p-5 my-5">
            <a style="float:right" class="btn btn-info" href="{{asset('category')}}">Go Back</a>
            <h3 class="text-center text-info d-block">Add Category From:</h3>
            <form class="my-5" action="{{asset('category')}}/{{$editdata->id}}" method="post">

                @if (isset($editdata->id))
                    @method("put")
                @endif
                @csrf
                <label class="text-center text-info mb-2" for="name"><h5>Category Name:</h5></label>
                @error("name")
                    <p class="text-danger text-capitalize">{{$message}}</p>
                @enderror
                <input value="{{old('name',$editdata->name)}}" type="text" name="name" id="name" placeholder="write category name...." class="form-control @error("name")
                    is-invalid
                @enderror">
                <input type="submit" value="submit" name="submit" class="btn btn-success mt-3 text-capitalie">
            </form>
        </div>
   </div>

@endsection
