@extends('admin.inc.master')

@section('title' , 'create Major')

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
                            <li class="breadcrumb-item active">Add New major </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="card card-primary mt-4 ml-4 mr-3 mb-2">
            <div class="card-header">
                <h3 class="card-title">Add new Major</h3>
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
            <form method="post" action="{{route('admin.major.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Major title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Major title should be unique">
                    </div>
                    <div class="form-group">
                        <label> Clinic Majors
                            <select name="major_id" class="custom-select form-control-border" id="exampleSelectBorder">
                                <option disabled selected> Our Majors </option>
                                @forelse($majors as $major)
                                    <option disabled >{{$major->title}}</option>
                                @empty
                                    <option> no majors to show </option>
                                @endforelse
                            </select>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Upload image <small class="text-danger"> * accept png,jpg,jpeg</small></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>




    </div>





    </div>
@endsection
