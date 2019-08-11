@extends('layouts.newadmin')

@section('content')

    <section class="content-header">

      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Assigned Students</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Dashbard</a></li>
              <li class="breadcrumb-item active">Assigned Students</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>




    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Assigned Students </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <p>



              </p>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Age</th>
                  <th>Action</th>






                </tr>
                </thead>
                <tbody>

                  @if(count($assignstudents))
                  @foreach($assignstudents as $user)
                  <tr>
                    <td>{{ $user->id}}</td>
                    <td>{{ $user->name}}</td>

                    <td>{{ $user->age}}</td>
                    <td>
                    <a href="{{ url('/admin/dailystudentreport', $user->id) }}"class="btn btn-primary">Daily Report</a>
                  </td>
                    </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="4">There is no Any Assigned Students</td>
                  </tr>
                  @endif


                </tbody>

              </table>
              <p >
                <label for="">Total Students: {{count($assignstudents)}} </label>


            </p>
            <p>
               <a href="{{ route('admin.teachers.index')}}"   class="btn btn-default">Back</a>
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
