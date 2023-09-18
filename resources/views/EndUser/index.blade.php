@extends('EndUser.inc.master')

@section('title')
    Home Page
@endsection

@section('content')
    <div class="container-fluid bg-blue text-white pt-3">
        <div class="container pb-5">
            <div class="row gap-2">

                <div class="col-sm order-sm-2">
                    <img src="{{asset('EndUserAssets')}}/assets/images/banner.jpg" class="img-fluid banner-img banner-img" alt="banner-image"
                         height="200">
                </div>

                <div class="col-sm order-sm-1">
                    <h1 class="h1">{{app('settings')['header']}}</h1>
                    <p>{{app('settings')['header_1']}}.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="h1 fw-bold text-center my-4">majors</h2>
        <div class="d-flex flex-wrap gap-4 justify-content-center">
            @forelse($majors as $major)
            <div class="card p-2" style="width: 18rem;">
                @if(file_exists(public_path('uploads/majors/'.$major->image)))
                    <img src="{{asset('uploads/majors')}}/{{$major->image}}" class="card-img-top rounded-circle card-image-circle"
                         alt="major">

                @else
                    <img src="{{asset('EndUserAssets')}}/assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                         alt="major">
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
        <h2 class="h1 fw-bold text-center my-4">doctors</h2>
        <section class="splide home__slider__doctors mb-5">
            <div class="splide__track ">
                <ul class="splide__list">
                    @forelse($doctors as $doctor)
                    <li class="splide__slide">
                        <div class="card p-2" style="width: 18rem;">
                            @if(file_exists(public_path('uploads/majors/'.$doctor['major']['image'])))
                            <img src="{{asset('uploads/majors')}}/{{$doctor['major']['image']}}" class="card-img-top rounded-circle card-image-circle"
                                 alt="major">
                            @else
                                <img src="{{asset('EndUserAssets')}}/assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                                     alt="major">
                            @endif
                            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                <h4 class="card-title fw-bold text-center" style="font-size: 18px">{{$doctor['name']}}</h4>
                                <h6 class="card-title fw-bold text-center">{{$doctor['major']['title']}}</h6>
                                <a href="{{route('doctor.index')}}" class="btn btn-outline-primary card-button">Browse
                                    Doctors</a>
                            </div>
                        </div>
                    </li>
                    @empty
                        @for($i=0 ; $i <= 7 ; $i++)
                        <li class="splide__slide">
                            <div class="card p-2" style="width: 18rem;">
                                <img src="{{asset('EndUserAssets')}}/assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                                     alt="major">
                                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                    <h4 class="card-title fw-bold text-center" style="font-size: 18px">Doctor Name</h4>
                                    <h6 class="card-title fw-bold text-center">Major</h6>
                                    <a href="#" class="btn btn-outline-primary card-button">Browse
                                        Doctors</a>
                                </div>
                            </div>
                        </li>
                        @endfor
                    @endforelse

                    @forelse($doctors as $doctor)
                    <li class="splide__slide">
                        <div class="card p-2" style="width: 18rem;">
                            @if(file_exists(public_path('uploads/majors/'.$doctor['major']['image'])))
                                <img src="{{asset('uploads/majors')}}/{{$doctor['major']['image']}}" class="card-img-top rounded-circle card-image-circle"
                                     alt="major">
                            @else
                                <img src="{{asset('EndUserAssets')}}/assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                                     alt="major">
                            @endif
                            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                <h4 class="card-title fw-bold text-center" style="font-size: 18px">{{$doctor['name']}}</h4>
                                <h6 class="card-title fw-bold text-center">{{$doctor['major']['title']}}</h6>
                                <a href="{{route('doctor.show',['doctor'=>$doctor['id']])}}" class="btn btn-outline-primary card-button">Book an
                                    appointment</a>
                            </div>
                        </div>
                    </li>
                    @empty
                            <li class="splide__slide">
                                <div class="card p-2" style="width: 18rem;">
                                    <img src="{{asset('EndUserAssets')}}/assets/images/major.jpg" class="card-img-top rounded-circle card-image-circle"
                                         alt="major">
                                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                        <h4 class="card-title fw-bold text-center" style="font-size: 18px">Doctor Name</h4>
                                        <h6 class="card-title fw-bold text-center">Major</h6>
                                        <a href="#" class="btn btn-outline-primary card-button">Book an
                                            appointment</a>
                                    </div>
                                </div>
                            </li>
                    @endforelse

                </ul>
            </div>
        </section>
    </div>
    <div class="banner container d-block d-lg-grid d-md-block d-sm-block">


        <div class="info">
            <div class="info__details">
                <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg"
                     alt="" width="50" height="50">
                <h4 class="title m-0">
                    {{app('settings')['info_header']}}
                </h4>
                <p class="content">
                    {{app('settings')['info_1']}}
                </p>
            </div>
        </div>
        <div class="info">
            <div class="info__details">
                <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg"
                     alt="" width="50" height="50">
                <h4 class="title m-0">
                    {{app('settings')['info_header']}}
                </h4>
                <p class="content">
                    {{app('settings')['info_2']}}

                </p>
            </div>
        </div>
        <div class="info">
            <div class="info__details">
                <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg"
                     alt="" width="50" height="50">
                <h4 class="title m-0">
                    {{app('settings')['info_header']}}
                </h4>
                <p class="content">
                    {{app('settings')['info_3']}}

                </p>
            </div>
        </div>
        <div class="info">
            <div class="info__details">
                <img src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/medical-care-icon.svg"
                     alt="" width="50" height="50">
                <h4 class="title m-0">
                    {{app('settings')['info_header']}}
                </h4>
                <p class="content">
                    {{app('settings')['info_4']}}
                </p>
            </div>
        </div>


        <div class="bottom--left bottom--content bg-blue text-white">

            <h4 class="title">{{app('settings')['application_download']}} </h4>
            <p>{{app('settings')['download']}}</p>
            <div class="app-group">
                <div class="app"><img
                        src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/google-play-logo.svg"
                        alt="">Google Play</div>
                <div class="app"><img
                        src="https://d1aovdz1i2nnak.cloudfront.net/vezeeta-web-reactjs/55619/_next/static/images/apple-logo.svg"
                        alt="">App Store</div>
            </div>
        </div>


        <div class="bottom--right bg-blue text-white">
            <img src="{{asset('EndUserAssets')}}/assets/images/banner.jpg" class="img-fluid banner-img">
        </div>
    </div>


@endsection
