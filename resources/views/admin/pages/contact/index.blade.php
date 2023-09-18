@extends('admin.inc.master')

@section('title' , 'Contact')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Contact</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active"> Contact </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->


        <div class="card-body">
                @if(session()->has('deleted'))
                <div class="alert alert-danger">
                {{session('deleted')}}
                </div>
            @endif
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th style="width: 30px;">#</th>
                    <th style="width: 120px;">Name</th>
                    <th style="width: 120px;">Email</th>
                    <th style="width: 80px;">Phone</th>
                    <th style="width: 180px;">Operations</th>
                </tr>
                </thead>
                <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->user->email}}</td>
                        <td>
                            @if($contact->phone == null)
                                <span class="badge badge-warning">
                                    no number
                                </span>
                            @else
                                {{$contact->phone}}
                            @endif
                        </td>

                        <td>
                            <form action="{{route('admin.contact.destroy',['contact'=>$contact->id])}}" method="post" style="display: inline-block">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('Confirm Delete')" title="delete"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5"><div class="alert alert-danger"> There Is No Contacts To Show </div></td>
                    </tr>
                @endforelse
                </tbody>
                {{$contacts->links()}}

            </table>
        </div>




    </div>





    </div>
@endsection

