@extends('front.app')
@section('content')


<div class="container">

    <div class="row">
        <div class="col-6 mx-auto">
            <form action="{{route('auth.do.login')}}" method="post" class="my-5 border p-3" enctype="multipart/form-data">
                <x-error></x-error>
                <x-success></x-success>
                @csrf
                <div class="mb-3">
                    <h1 class="text-center my-3 p-2"> Welcome Back</h1>
                </div>

                <div class="mb-3">
                    <label for=""> Email</label>
                    <input type="text" name="email" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <label for=""> Password</label>
                    <input type="password" name="password" id="" class="form-control">
                </div>
                <div class="mb-3">
                    <input type="submit" value="Save" class="form-control btn btn-primary">
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
