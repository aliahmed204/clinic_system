@extends('admin.inc.master')

@section('title' , 'Show User')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Show User </li>
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
                                User Info
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <dl>
                                <dt> User Id: {{$user->id}}</dt>
                                <dt> User name: {{$user->name}} </dt>
                                <dt> User email: {{$user->email}} </dt>
                                <dt> User phone: {{$user->phone ?? '--- --- ---'}} </dt>
                                <dt>Created At: {{$user->created_at}}</dt>


                            </dl>
                        </div>
                        <!-- /.card-body -->
                    </div><a href="{{route('admin.user.index')}}" class="btn btn-primary">Go Back</a>

                    <!-- /.card -->
                </div>
                <!-- ./col -->
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-text-width"></i>
                                User History
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <dl>
                                <dt>History : </dt>
                                <dd class="ml-5">
                                    {{--@dd($bookings)--}}
                                    @foreach($bookings as $doc)
                                        <dd> {{$loop->iteration}} :</dd>
                                        <dd class="ml-5"> Clinic:
                                            {{$doc->doctor->major->title . '.'}}
                                        </dd>
                                        <dd class="ml-5">  doctor name:
                                            {{$doc->doctor->name . '.'}}
                                        </dd>
                                        <dd class="ml-5">
                                            booking date :
                                            {{$doc->booking_date}}
                                        </dd>
                                        <dd class="ml-5">booking Status :
                                            @if($doc->status == '0')
                                                <span class="badge badge-warning">
                                                booked
                                            </span>
                                            @elseif($doc->status == '1')
                                                <span class="badge badge-success">
                                                detected
                                               </span>
                                                {{$doc->updated_at}}
                                            @endif
                                        </dd>
                                    @endforeach
                                </dd>
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
