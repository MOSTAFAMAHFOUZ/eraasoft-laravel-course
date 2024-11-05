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
        <div class="col-12 my-2 text-center">
            <a href="{{url('majors/add')}}" class="btn btn-success">Add Major</a>
        </div>
    </div>
    <div class="majors-grid">
        @foreach ($majors as $major)
        <div class="card p-2" style="width: 18rem;">
            <img src="{{asset('uploads/majors/'.$major->image)}}" class="card-img-top rounded-circle card-image-circle"
                alt="major">
            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                <h4 class="card-title fw-bold text-center">{{$major->name}}</h4>
                <a href="./doctors/index.html" class="btn btn-outline-primary card-button">Browse Doctors</a>
            </div>
        </div>
        @endforeach



    </div>

    <div class="p-2">

        {{$majors->links()}}
    </div>
</div>

@endsection
