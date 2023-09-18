@extends('admin.inc.master')

@section('title' , 'Booking')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Booking</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active"> Booking </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->


        <div class="card-body">

                @if(session()->has('updated'))
                <div class="alert alert-info">
                {{session('updated')}}
                </div>
            @endif
                @if(session()->has('deleted'))
                <div class="alert alert-warning">
                {{session('deleted')}}
                </div>
            @endif
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th style="width: 30px;">#</th>
                    <th style="width: 120px;">patient name</th>
                    <th style="width: 120px;">treating doctor</th>
                    <th style="width: 120px;">Clinic</th>
                    <th style="width: 180px;">Date</th>
                    <th style="width: 80px;">status</th>
                    <th style="width: 180px;">Operations</th>
                </tr>
                </thead>
                <tbody>
                @forelse($bookings as $booking )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$booking->user->name}}</td>
                        <td><a href="{{route('admin.doctor.index')}}" style="color: black;">{{$booking->doctor->name}}</a></td>

                        <td>
                            <a href="{{route('admin.major.show',['major'=>$booking->doctor->major_id])}}" style="color: black;">
                                {{$booking->doctor->major->title}}
                            </a>
                        </td>
                        <td>{{$booking->booking_date}}</td>
                        <td>
                            @if($booking->status == '0')
                                <span class="badge badge-warning">
                                    booked
                                </span>
                                @elseif($booking->status == '1')
                                <span class="badge badge-success">
                                    detected
                                </span>
                            @endif

                        </td>

                        <td>
                            @if ($booking->status == '0')
                            <form action="{{route('admin.booking.update',['booking'=>$booking->id])}}" method="post" style="display: inline-block">
                                @csrf
                                @method('patch')
                                <button class="btn btn-success" onclick="return confirm('Confirm update')" title="delete">Update Status</button>
                            </form>
                            @endif
                            <form action="{{route('admin.booking.destroy',['booking'=>$booking->id])}}" method="post" style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('Confirm Delete')" title="delete"><i class="fa fa-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5"><div class="alert alert-danger"> There Is No Majors To Show </div></td>
                    </tr>
                @endforelse
                </tbody>
                {{ $bookings->links()}}

            </table>
        </div>




    </div>





    </div>
@endsection

