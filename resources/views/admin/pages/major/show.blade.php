@extends('admin.inc.master')

@section('title' , 'Show Major')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Majors</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Show Major </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->


            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="row mr-4">
                <div class="col-md-7 m-3 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-text-width"></i>
                                Description
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <dl>
                                <dt> Major Id: {{$major->id}}</dt>
                                <dt>Title: {{$major->title}} </dt>
                                <dt>Created At: {{$major->created_at->format('Y-m-d')}}</dt>
                                <dt>Major Doctors: </dt>
                                <dd class="ml-5">
                                    @foreach($major->doctors as $doc)
                                        {{$doc->name . '.'}}<br>
                                    @endforeach
                                </dd>

                            </dl>
                        </div>
                        <!-- /.card-body -->
                    </div><a href="{{route('admin.major.index')}}" class="btn btn-primary">Go Back</a>

                    <!-- /.card -->
                </div>
                <!-- ./col -->
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-text-width"></i>
                                Image
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <dl>
                                <dt> Major Id: {{$major->id}}</dt>
                                <dt><img src="{{asset(App\Models\Major::Major_PATH.$major->image)}}" alt="major image" width="250" height="400"> </dt>
                            </dl>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>

        </div>




    </div>





    </div>
@endsection
