@extends('admin.inc.master')

@section('title' , 'Edit Major')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Doctors</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Major </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="card card-primary mt-4 ml-4 mr-3 ">
            <div class="card-header">
                <h3 class="card-title">Edit Major</h3>
            </div>
            <div class="m-3 ml-4">
                <img src="{{asset(\App\Models\Major::Major_PATH.$major->image)}}" width="100"  alt="mmm">
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="{{route('admin.major.update',['major' => $major->id])}}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Major Title</label>
                        <input type="text" name="title" value="{{$major->title}}" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        <input type="hidden" name="major" value="{{$major->id}}" >
                    </div>
                    @error('title')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                    @enderror

                    <div class="form-group">
                        <label> Clinic Majors
                            <select name="major_id" class="custom-select form-control-border" id="exampleSelectBorder">
                                <option disabled selected> Our Majors </option>
                                @forelse($majors as $major)
                                    <option disabled >{{$major->title}}</option>
                                @empty
                                    <option> 1 </option>
                                @endforelse
                            </select>
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">image <small class="text-danger"> * accept png,jpg,jpeg</small></label>
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
                        @error('image')
                            <div class="alert alert-danger">
                                {{$message}}
                            </div>
                        @enderror
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>




    </div>





    </div>
@endsection
