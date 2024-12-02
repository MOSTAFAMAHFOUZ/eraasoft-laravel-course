@extends('front.app')
@section('content')
    <div class="container-fluid bg-blue text-white pt-3">
        <div class="container pb-5">
            <div class="row gap-2">
                <div class="col-sm order-sm-2">
                    <img src="{{ asset('front') }}/assets/images/banner.jpg" class="img-fluid banner-img banner-img" alt="banner-image"
                        height="200">
                </div>
                <div class="col-sm order-sm-1">
                    <h1 class="h1">Have a Medical Question?</h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa nesciunt repellendus itaque,
                        laborum
                        saepe
                        enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis
                        consequatur
                        cum
                        iure
                        quod facere.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="h1 fw-bold text-center my-4">majors</h2>
        <div class="d-flex flex-wrap gap-4 justify-content-center">
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
        <h2 class="h1 fw-bold text-center my-4">doctors</h2>
        <section class="splide home__slider__doctors mb-5">
            <div class="splide__track ">
                <ul class="splide__list">
                    @foreach($doctors as $doctor)
                    <li class="splide__slide">
                        <div class="card p-2" style="width: 18rem;">
                            <img src="{{ asset('uploads/doctors/'.$doctor->image) }}" class="card-img-top rounded-circle card-image-circle"
                                alt="major">
                            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                <h4 class="card-title fw-bold text-center">{{$doctor->name}}</h4>
                                <h6 class="card-title fw-bold text-center">{{$doctor->major->name}}</h6>
                                <a href="{{route('appointments.create',$doctor->id)}}" class="btn btn-outline-primary card-button">Book an
                                    appointment</a>
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </section>
    </div>
@endsection




