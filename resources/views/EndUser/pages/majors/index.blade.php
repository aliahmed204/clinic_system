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
                <li class="breadcrumb-item active" aria-current="page">Majors</li>
            </ol>
        </nav>
            {{-- Content  --}}
            <div class="majors-grid">
                @forelse($majors as $major)
                <div class="card p-2" style="width: 18rem;">
                    @if(file_exists(public_path('uploads/majors/'.$major->image )))
                        <img src="{{asset('uploads/majors')}}/{{$major->image}}"
                             class="card-img-top rounded-circle card-image-circle" alt="major">
                    @else
                        <img src="{{asset('EndUserAssets')}}/assets/images/major.jpg"
                             class="card-img-top rounded-circle card-image-circle"  alt="major">
                    @endif
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">{{$major->title}}</h4>
                        <a href="{{route('doctor.majorDoctor',['major'=> $major->id])}}" class="btn btn-outline-primary card-button">Browse Doctors</a>
                    </div>
                </div>


                @empty
                    @for($i=0 ; $i <= 7 ; $i++)
                        <div class="card p-2" style="width: 18rem;">
                            <img src="{{asset('EndUserAssets')}}/assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                                 alt="major">
                            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                <h4 class="card-title fw-bold text-center">Major title</h4>
                                <a href="#" class="btn btn-outline-primary card-button">Browse Doctors</a>
                            </div>
                        </div>
                    @endfor
                @endforelse
            </div>
        <nav class="mt-5" aria-label="navigation">
            <ul class="pagination justify-content-center">
                <li class="page-item">{!! $majors->links()  !!}</li>
            </ul>
        </nav>
    </div>
@endsection

@push('js')

@endpush

