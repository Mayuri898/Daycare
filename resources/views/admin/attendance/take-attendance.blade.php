@extends('layouts.newadmin')
@section('content')
    <section class="content-header">

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Attendance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Dashbard</a></li>
              <li class="breadcrumb-item active">Events</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-body">
              <p>
                 <form role="form" method="post" action="{{ route('admin.events.store')}}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Header</label>
                    <input type="text" class="form-control" id="" name="name" >
                  </div>
                  <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" class="form-control" id="" name="organizeddate" >
                  </div>

                 <div class="form-group">
                    <label for="">Image </label>
                    <input type="file" class="form-control" id="" name="image" >
                  </div>
                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" id="inputExperience" name="description" placeholder="Enter Description"></textarea>

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
              <form action="{{route('attendance')}}" method="post">
                     {{ csrf_field() }}
<div class="table-responsive">
  <table class="table">
    <td> Date: <input type ="date" name="attendance_date" class="form-control" required="true">
<!-- <script> document.write(new Date().toLocaleDateString()); </script> -->
</td>
    <td>
  Time From : <input type="time" name="from_time" class="form-control" required="true">
</td>
  <td>
  Time To : <input type="time" name="to_time" class="form-control" required="true">
</td>
<td>
 <!--select class="form-control" id="att" name="att" onchange="uncheckAll()">
                        <option value="p">Present</option>
                        <option value="a">Absent</option>
                      </select-->
                    </td>
                    <td>

                       <div class="demo-radio-button" id="att" onchange="uncheckAll()">
                                <input  name="group1" type="radio" id="present" value="p" checked="true" />
                                <label for="present">Present Students</label>
                                <input  name="group1" value="a" type="radio" id="absent" />
                                <label for="absent">Absent Students</label>

                            </div>
                    </td>

                    </table>
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
                  <th>Header</th>
                  <th>Date</th>
                  <th>Action</th>






                </tr>
                </thead>
                <tbody>




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
@endsection