@extends('admin.inc.master')

@section('title' , 'Doctors')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Doctors</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active"> Doctors </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->


        <div class="card-body">
            @if(session()->has('success'))
                <div class="alert alert-success">
                {{session('success')}}
                </div>
            @endif
                @if(session()->has('updated'))
                <div class="alert alert-info">
                {{session('updated')}}
                </div>
            @endif
                @if(session()->has('soft_delete'))
                <div class="alert alert-warning">
                {{session('soft_delete')}}
                </div>
            @endif
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th style="width: 30px;">#</th>
                    <th style="width: 120px;">Name</th>
                    <th style="width: 120px;">Image</th>
                    <th style="width: 80px;">Major</th>
                    <th style="width: 180px;">Operations</th>
                </tr>
                </thead>
                <tbody>
                @forelse($doctors as $doctor)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$doctor->name}}</td>
                        <td><img src="{{asset(\App\Models\Doctor::IMAGE_PATH.$doctor->image)}}" alt="Doc" width="80"></td>
                        <td><a href="{{route('admin.major.show',['major'=> $doctor->major_id])}}">{{$doctor->major->title}}</a></td>

                        <td>
                            <a href="{{route('admin.doctor.edit',['doctor'=>$doctor->id])}}" class="btn btn-primary">Edit</a>

                            <form action="{{route('admin.doctor.delete',['doctor'=>$doctor->id])}}" method="post" style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-warning" onclick="return confirm('Confirm Move To Archive')">Archive</button>
                            </form>
                            <form action="{{route('admin.doctor.destroy',['doctor'=>$doctor->id])}}" method="post" style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('Confirm Delete')" title="delete"><i class="fa fa-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5"><div class="alert alert-danger"> There Is No Doctors To Show </div></td>
                    </tr>
                @endforelse
                </tbody>
                {{$doctors->links()}}

                <div class="row mb-3">
                    <div class="col sm-12">
                        <a href="{{route('admin.doctor.create')}}" class="btn btn-info">Add New Doctor</a>
                    </div>
                </div>

            </table>
        </div>




    </div>





    </div>
@endsection

