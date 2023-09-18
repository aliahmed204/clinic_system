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

                @if(session()->has('force_delete'))
                    <div class="alert alert-danger">
                    {{session('force_delete')}}
                    </div>
                @endif
            <table class="table table-bordered">
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
                        <td>{{$doctor->major->title}}</td>

                        <td>
                            <form action="{{route('admin.doctor.restore',['doctor'=>$doctor->id])}}" method="post" style="display: inline-block">
                                @csrf
                                <button class="btn btn-warning" onclick="return confirm('Confirm Restore This doctor')">Restore</button>
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
                        <td colspan="5"><div class="alert alert-danger"> There Is No Doctors To Show </div> </td>
                    </tr>
                @endforelse
                </tbody>
                {{$doctors->links()}}

                <div class="row mb-3">
                    <div class="col sm-12">
                        <a href="{{route('admin.doctor.index')}}" class="btn btn-primary">All Doctors</a>
                    </div>
                </div>

            </table>
        </div>




    </div>





    </div>
@endsection

