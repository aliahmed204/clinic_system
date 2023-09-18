@extends('admin.inc.master')

@section('title' , 'Users')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">All Admins</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active"> Admins </li>
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
                <div class="alert alert-danger">
                {{session('deleted')}}
                </div>
            @endif
                @if(session()->has('role'))
                    <div class="alert alert-success">
                    {{session('role')}}
                    </div>
                @endif
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th style="width: 30px;">#</th>
                    <th style="width: 120px;">Name</th>
                    <th style="width: 120px;">Email</th>
                    <th style="width: 80px;">Phone</th>
                    <th style="width: 80px;">Role</th>
                    <th style="width: 180px;">Operations</th>
                </tr>
                </thead>
                <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->phone == null)
                                <span class="badge badge-warning">
                                    no number
                                </span>
                            @else
                                {{$user->phone}}
                            @endif
                        </td>
                        <td>
                            @if($user->role == 'admin')
                                <span class="badge badge-success">
                                    {{$user->role}}
                                </span>
                            @elseif($user->role == 'super')
                                <span class="badge badge-danger">
                                    {{$user->role}}
                                </span>
                            @endif
                        </td>

                        <td>
                            <a href="{{route('admin.user.show',['user'=>$user->id])}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                            <a href="{{route('admin.user.edit',['user'=>$user->id])}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>


                            <form action="{{route('admin.user.destroy',['user'=>$user->id])}}" method="post" style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('Confirm Delete')" title="delete"><i class="fa fa-trash"></i></button>
                            </form>
                            {{-- only super-admin can change admin role to use  --}}
                            @if(auth()->user()->role == 'super')
                                <form action="{{route('admin.user.makeRoleUser',['user'=>$user->id])}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('patch')
                                    <button class="btn btn-success" onclick="return confirm('Confirm Change Role')" title="role=user">make-user</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5"><div class="alert alert-danger"> There Is No Doctors To Show </div></td>
                    </tr>
                @endforelse
                </tbody>
                {{$users->links()}}

                <div class="row mb-3">
                    <div class="col sm-12">
                        <a href="{{route('admin.user.create')}}" class="btn btn-info">Add New user</a>
                    </div>
                </div>

            </table>
        </div>




    </div>





    </div>
@endsection

