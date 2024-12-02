@extends('front.app')
@section('content')


<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">majors</li>
        </ol>
    </nav>
    <div class="row">
        @auth
        <div class="col-12 my-2 text-center">
            @if(auth()->user()->role == "admin")

            <a href="{{url('majors/add')}}" class="btn btn-success">Add Major</a>
            @endif
        </div>
        @endauth
        <x-error></x-error>
                <x-success></x-success>
    </div>

    <div class="majors-grid">
        @forelse ($majors as $major)
        <div class="card p-2" style="width: 18rem;">
            <img src="{{asset('uploads/majors/'.$major->image)}}" class="card-img-top rounded-circle card-image-circle"
                alt="major">
            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                <h4 class="card-title fw-bold text-center">{{$major->name}}</h4>
                <a href="{{url('majors/'.$major->id."/doctors")}}" class="btn btn-outline-primary card-button">Browse Doctors</a>
                @auth
                    @if(auth()->user()->role == "admin")

                    <a href="{{url('majors/'.$major->id."/edit")}}" class="btn btn-outline-info card-button">Edit Major</a>
                    <form action="{{url('majors/'.$major->id)}}" method="POST" style="">
                        @csrf
                        @method("DELETE")
                    <button type="submit" class="btn btn-danger card-button">Delete Major</button>

                    </form>
                    @endif
                @endauth
            </div>

        </div>
        @empty
        <div class="text-center alert alert-info "> There is no majors yet ! </div>
        @endforelse



    </div>

    <div class="p-2">

        {{$majors->links()}}
    </div>
</div>

@endsection
