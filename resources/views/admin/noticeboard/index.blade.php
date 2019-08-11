@extends('layouts.newadmin')

@section('content')

    <section class="content-header">

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Noticeboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Dashbard</a></li>
              <li class="breadcrumb-item active">Noticeboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


 <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Notice </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>
                 <form role="form" method="post" action="{{ route('admin.noticeboard.store')}}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Header</label>
                    <input type="text" class="form-control" id="" name="header" >
                  </div>
                  <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" class="form-control" id="" name="todaysdate" >
                  </div>
                  <div class="form-group">
                    <label for="">Time</label>
                    <input type="time" class="form-control" id="" name="writetime" >
                  </div>
                   <div class="form-group">
                    <label for="">Description</label>
                     <textarea class="form-control" id="inputExperience" name="noticedescription" placeholder="Enter Description.."></textarea>

                  </div>





                </div>
                <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary toastrDefaultSuccess" value="Save"> </button>
            </div>
                <!-- /.card-body -->


              </form>

              </p>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Details of Notices </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <p>

                  <a href=""  data-toggle="modal" data-target="#modal-lg" class="btn btn-primary">Add New</a>

              </p>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>


                  <th>Date & Time</th>
                  <th>Description</th>

                  <th>Action</th>




                </tr>
                </thead>
                <tbody>

                  @if(count($users))
                  @foreach($users as $user)
                  <tr>
                    <td>{{ $user->id}}</td>

                    <td>{{ $user->todaysdate}} {{$user->writetime}}</td>

                    <td>{{ $user->noticedescription}}</td>





                    <td>
                      <a href="{{ route('admin.noticeboard.show',$user->id)}}"  class="btn btn-info">
                        <i class="fas fa-edit"></i>
                      </a>


                      <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                      </a>

                       <form action="{{  route('admin.noticeboard.destroy',$user->id)}}" method="post">
                        @method('DELETE')

                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      </form>

                    </td>




                  </tr>



                  @endforeach
                  @else
                  <tr>
                    <td colspan="6">There is no such record</td>
                  </tr>
                  @endif









                </tbody>

              </table>
              <p >

            </p>
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
