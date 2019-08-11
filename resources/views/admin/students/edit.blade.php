@extends('layouts.newadmin')

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Dashbard</a></li>
              <li class="breadcrumb-item active">Edit User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

      <!-- /.modal -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit  User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                    <form role="form" method="POST" action="{{ route('admin.students.update',$user->id)}}" enctype="multipart/form-data">
                      @method('PUT')
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Full Name</label>
                    <input type="text" class="form-control" id="" name="name" value="{{$user->name}}" >
                  </div>
                  <div class="form-group">
                    <label for="">Age</label>
                    <input type="text" class="form-control" id="" name="age" value="{{$user->age}}" >
                  </div>
                   <div class="form-group">
                    <label for="">Phone No</label>
                    <input type="text" class="form-control" id=""value="{{$user->mobileno}}">
                  </div>


                  <div class="form-group">
                    <label for="">Image</label>
                    <input type="file" class="form-control" id="" name="image" >
                    <div class="clearfix"></div>
                    <img  src="{{ asset('public/students/'.$user->image) }}" style="width: 150px;">
                  </div>
                  <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" id="" name="email" value="{{$user->email}}" >
                  </div>
                  <div class="form-group">
                    <label for="">Assigned Teacher</label>
                    <select name="teachers_id" class="form-control">

                      <option value="">Assigned Teacher</option>

                       @foreach($teachers as $t)
                          <option value="{{ $t->id }}"

                            @if($t->id == $user->teachers_id)
                              selected
                            @endif
                            >{{$t->name}}</option>
                       @endforeach

                    </select>
                  </div>



                </div>
                <div class="modal-footer justify-content-between">
               <input type="submit" class="btn btn-primary toastrDefaultSuccess" value="Save"/>
            </div>
                <!-- /.card-body -->


              </form>


            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


@endsection
