@extends('admin.inc.master')

@section('title' , 'Booked')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Booked Booking</h1>
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
                        <td><a href="{{route('admin.major.show',[$booking->doctor->major_id])}}" style="color: black;">{{$booking->doctor->major->title}}</a></td>
                        <td>{{$booking->booking_date}}</td>
                        <td>
                            <span class="badge badge-warning">
                                booked
                            </span>
                        </td>

                        <td>
                            <form action="{{route('admin.booking.destroy',['booking'=>$booking->id])}}" method="post" style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('Confirm Delete')" title="delete"><i class="fa fa-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5"><div class="alert alert-danger"> There Is No Booking To Show </div></td>
                    </tr>
                @endforelse
                </tbody>
                {{ $bookings->links()}}

                <div class="row mb-3">
                    <div class="col sm-12">
                        <a href="{{route('admin.booking.index')}}" class="btn btn-info">Back To Bookings</a>
                    </div>
                </div>
            </table>
        </div>
    </div>
    </div>
@endsection

