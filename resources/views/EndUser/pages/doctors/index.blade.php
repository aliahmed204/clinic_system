@extends('EndUser.inc.master')

@section('title')
    Doctors
@endsection

@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item">
                    <a class="text-decoration-none" href="{{route('index')}}" >
                        Home
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">doctors</li>
            </ol>
        </nav>
            {{-- majors filteration  --}}
        @if(isset($majors))
        <div class="filteration d-flex gap-3 mb-3 flex-wrap justify-content-center justify-content-lg-start justify-content-md-start">
            <div class="dropdown">
                <button class="btn bg-blue btn-primary align-items-center d-flex gap-2 dropdown-toggle"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    major
                </button>
                <ul class="dropdown-menu">
                @forelse($majors as $major)
                <li><a class="dropdown-item" href="{{route('doctor.majorDoctor',['major'=> $major->id])}}">{{$major->title}}</a></li>
                    @empty
                    <li><a class="dropdown-item" href="#">Majors</a></li>
                    @endforelse
                    <li><a class="dropdown-item" href="{{route('major.index')}}">All Majors</a></li>
                </ul>
            </div>
        </div>
        @endif

        <div class="doctors-grid">
            @forelse($doctors as $doctor)
            <div class="card p-2" style="width: 18rem;">
                @if(!file_exists(public_path('uploads/doctors/'.$doctor->image )) || $doctor->image == null )
                    <img src="{{asset('EndUserAssets')}}/assets/images/major.jpg"
                         class="card-img-top rounded-circle card-image-circle" alt="major">
                @else
                    <img src="{{asset('uploads/doctors')}}/{{$doctor->image}}"
                         class="card-img-top rounded-circle card-image-circle" alt="major">
                @endif
                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                    <h4 class="card-title fw-bold text-center" style="font-size: 18px">{{$doctor->name}}</h4>
                    <h6 class="card-title fw-bold text-center">{{$doctor->major->title}} Clinic</h6>
                    <a href="{{route('doctor.show',['doctor'=>$doctor->id])}}"  class="btn btn-outline-primary card-button">
                        Book an appointment
                    </a>
                </div>
            </div>
            @empty
                <div class="alert alert-info" > Sorry there is no Doctors to Show Now
                    <a class="btn btn-outline-info" style="font-size: 18px" href="{{route('index')}}" >
                        Go Back To Home-Page
                    </a>
                </div>

            @endforelse

        </div>
        <nav class="mt-5" aria-label="navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item">{{$doctors->links()}}</li>
            </ul>
        </nav>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
            integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

