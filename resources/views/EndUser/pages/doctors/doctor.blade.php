@extends('EndUser.inc.master')

@section('title')
    Doctors
@endsection


@section('content')

        <div class="container">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{route('doctor.index')}}">doctors</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">doctor name</li>
                </ol>
            </nav>
            <div class="d-flex flex-column gap-3 details-card doctor-details">
                <div class="details d-flex gap-2 align-items-center">
                    @if(file_exists(public_path('uploads/doctors/'.$doctor->image )))
                        <img src="{{asset('uploads/doctors')}}/{{$doctor->image}}"
                             alt="doctor" class="img-fluid rounded-circle" height="150" width="150">
                    @else
                        <img src="{{asset('EndUserAssets')}}/assets/images/major.jpg"
                             alt="doctor" class="img-fluid rounded-circle" height="150" width="150">
                    @endif

                    <div class="details-info d-flex flex-column gap-3 ">
                        <h4 class="card-title fw-bold">{{$doctor->name}}</h4>
                        <div class="d-flex gap-3 align-bottom text-center">
                            <form method="POST" action="{{ route('doctor.submit_rating',['doctor'=>$doctor->id]) }}">
                                @csrf
                                <ul class="rating" id="rating">
                                    <li class="star"><input type="radio" id="rating1" name="rating" value="1"><label for="rating1"></label></li>
                                    <li class="star"><input type="radio" id="rating2" name="rating" value="2"><label for="rating2"></label></li>
                                    <li class="star"><input type="radio" id="rating3" name="rating" value="3"><label for="rating3"></label></li>
                                    <li class="star"><input type="radio" id="rating4" name="rating" value="4"><label for="rating4"></label></li>
                                    <li class="star"><input type="radio" id="rating5" name="rating" value="5"><label for="rating5"></label></li>
                                </ul>
                                <button type="submit" class="align-baseline" style="border: none; background-color: white; color: blue">Submit Rating</button>
                            </form>
                        </div>
                        <h6 class="card-title fw-bold">Doctor major : {{$doctor->major->title}}<br>
                            Joined the clinic on: {{$doctor->created_at->format('Y-m-d')}}
                        </h6>
                    </div>
                </div>
                <hr />
                @if($errors->any())
                    <div class="alert alert-danger mt-2">
                        @foreach($errors->all() as $error )
                            <li> {{$error}}</li>
                        @endforeach
                    </div>
                @endif
                @if(session()->has('Booked'))
                    <div class="alert alert-success mt-2">
                        {{session()->get('Booked')}}
                    </div>
                @endif
                <form class="form" method="POST" action="{{route('bookData')}}">
                    @csrf
                    <div class="form-items">
                        <div class="mb-3">
                            <label class="form-label required-label" for="name">Name</label>
                            <input type="text" class="form-control" id="name"  name="name" @if(auth()->user()) value="{{auth()->user()->name}}" @endif required>
                        </div>
                        <input type="hidden" class="form-control" name="doctor_id" @if(auth()->user())  value="{{$doctor->id}}" @endif>
                        <input type="hidden" class="form-control" name="user_id" @if(auth()->user())  value="{{auth()->user()->id}}" @endif >
                        <div class="mb-3">
                            <label class="form-label required-label" for="phone">Phone</label>
                            <input type="tel" class="form-control" id="phone"  name="phone" @if(auth()->user())  value="{{auth()->user()->phone}}"@endif  required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="email">Email</label>
                            <input type="email" class="form-control" @if(auth()->user())  value="{{auth()->user()->email}}"@endif id="email"  name="email"  required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label required-label" for="email"> booking_date </label>
                            <input type="date" class="form-control fc-datepicker" name="booking_date" placeholder="YYYY-MM-DD" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Confirm Booking</button>
                </form>

            </div>
        </div>

@endsection

@push('js')
    <script>
        const stars = document.querySelectorAll('.star');

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                const isActive = star.classList.contains('active');
                if (isActive) {
                    star.classList.remove('active');
                } else {
                    star.classList.add('active');
                }
                for (let i = 0; i < index; i++) {
                    stars[i].classList.add('active');
                }
                for (let i = index + 1; i < stars.length; i++) {
                    stars[i].classList.remove('active');
                }
            });
        });
    </script>
@endpush

