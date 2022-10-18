@extends("fontent.layout.fontentlayout")
@section("content")

    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12 bg-dark text-light my-5 form">
                <h4 class="text-center text-capitalize text-info py-4">Register Form:</h4>
                <div class="account-form form-style py-3">
                    <form action="{{asset('/checkregistation')}}" method="post">
                        @csrf
                        @method("post")
                        <p class="text-light py-2">User Name *</p>
                        @error("name")
                            <div class="text-danger text-capitalize">{{$message}}</div>
                        @enderror
                        <input class="form-control @error("name")
                        is-invalid
                        @enderror"  type="text" name="name" placeholder="Enter Your Name">
                        <p class="text-light py-2">User Email Address *</p>
                        @error("email")
                            <div class="text-danger text-capitalize">{{$message}}</div>
                        @enderror
                        <input class="form-control @error("email")
                            is-invalid
                        @enderror"  type="email" name="email" placeholder="Enter Your Email">
                        <p class="text-light py-2">Password *</p>
                        @error("password")
                            <div class="text-danger text-capitalize">{{$message}}</div>
                        @enderror
                        <input class="form-control @error("password")
                            is-invalid
                        @enderror" type="Password" name="password" placeholder="Enter Your Password">
                        <p class="text-light py-2">Confirm Password *</p>
                        @error("confirmpassword")
                            <div class="text-danger text-capitalize">{{$message}}</div>
                        @enderror
                        <input class="form-control @error("confirmpassword")
                            is-invalid
                        @enderror" type="Password" name="confirmpassword" placeholder="Enter Your Confirm Password">
                        <input class="btn btn-success d-block" type="submit" value="Register">
                        <a class="btn btn-info mb-3" href="{{asset('userlogin')}}">Or Login</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
