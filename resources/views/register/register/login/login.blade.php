@extends("fontent.layout.fontentlayout")
@section("content")

    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12 bg-dark text-light my-5 form">
                <h4 class="text-center text-capitalize text-info py-4">Register Form:</h4>
                <div class="account-form form-style py-3">
                    <form action="{{asset('/checklogin')}}" method="post">
                        @csrf
                        @method("post")
                        <p class="text-light py-2">User Email Address *</p>
                        @error("email")
                            <div class="text-danger text-capitalize">{{$message}}</div>
                        @enderror
                        <input class="form-control @error("email")
                            is-invalid
                        @enderror"  type="email" name="email" placeholder="Enter Your Email">
                        <p class="text-light py-2">Password *</p>
                        <input class="form-control @error("password")
                            is-invalid
                        @enderror" type="Password" name="password" placeholder="Enter Your Password">
                        <input class="btn btn-success d-block" type="submit" value="Login Now">
                        <div class="register text-center">
                            <a href="{{asset('registation')}}" class="btn btn-info">Create A New Accoutn</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
