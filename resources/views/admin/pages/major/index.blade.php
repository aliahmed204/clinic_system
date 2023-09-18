@extends('admin.inc.master')

@section('title' , 'majors')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Majors</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active"> Majors </li>
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
                @if(session()->has('deleted'))
                <div class="alert alert-warning">
                {{session('deleted')}}
                </div>
            @endif
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th style="width: 30px;">#</th>
                    <th style="width: 120px;">title</th>
                    <th style="width: 120px;">Image</th>
                    <th style="width: 180px;">Operations</th>
                </tr>
                </thead>
                <tbody>
                @forelse($majors as $major )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$major->title}}</td>
                        <td><img src="{{asset(\App\Models\Major::Major_PATH.$major->image)}}" alt="Major" width="80"></td>
                        <td>
                            <a href="{{route('admin.major.show',['major'=>$major->id])}}" class="btn btn-info">Show</a>
                            <a href="{{route('admin.major.edit',['major'=>$major->id])}}" class="btn btn-primary">Edit</a>

                            <form action="{{route('admin.major.destroy',['major'=>$major->id])}}" method="post" style="display: inline-block">
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
                {{$majors->links()}}

                <div class="row mb-3">
                    <div class="col sm-12">
                        <a href="{{route('admin.major.create')}}" class="btn btn-info">Add New Major</a>
                    </div>
                </div>

            </table>
        </div>
    </div>
@endsection

