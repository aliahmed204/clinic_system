@extends('admin.inc.master')

@section('title' , 'Home Settings')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Settings</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                            <li class="breadcrumb-item active">Home Settings </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->


            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Home Elements</h3>
            </div>
            <!-- /.card-header -->

                @forelse($settings as $setting)
                <div class="card-body">
                <form method="post" action="{{route('admin.setting.homeUpdate',['setting' => $setting->id])}}" >
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-sm-8 ml-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>title</label>
                                <input type="text" disabled class="form-control" value="{{$setting->key}}" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8 ml-5">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>Text</label>
                                <textarea class="form-control" rows="3" name="value" placeholder="Enter ...">{{$setting->value}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
                </div>
                @empty
                @endforelse


            <!-- /.card-body -->
        </div>





    </div>
@endsection
