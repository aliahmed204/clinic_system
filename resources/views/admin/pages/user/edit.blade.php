@extends('admin.inc.master')

@section('title' , 'Edit User')

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
                            <li class="breadcrumb-item active">Edit User </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="card card-primary mt-4 ml-4 mr-3 mb-2">
            <div class="card-header">
                <h3 class="card-title">Edit User</h3>
            </div>
            <!-- /.card-header -->
            @if($errors->any())
                <div class="alert alert-danger mt-2">
                    @foreach($errors->all() as $error )
                        <li> {{$error}}</li>
                    @endforeach
                </div>
            @endif


            <!-- form start -->
            <form method="post" action="{{route('admin.user.update',['user'=>$user->id])}}">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">User Name</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter User Name">
                        <input type="hidden" name="id" value="{{$user->id}}" class="form-control" id="exampleInputEmail1" placeholder="Enter User Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Valid email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" name="password"  class="form-control" id="exampleInputEmail1" placeholder="Enter Strong Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" name="phone" value="{{$user->phone}}" class="form-control" id="exampleInputEmail1" placeholder="User Phone ">
                    </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Updata</button>
                </div>
            </form>
        </div>




    </div>





    </div>
@endsection
