 @extends('layouts.newadmin')

@section('content')


 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Modal view -->
<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add New Memories </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>
                 <form role="form" method="POST" action="{{ url('/admin/memories/add')}}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="student_id" value="{{ $dailystudentreport->id }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Header</label>
                    <input type="text" class="form-control" id="" name="header" >
                  </div>


                 <div class="form-group">
                    <label for="">Insert Photo </label>
                    <input type="file" class="form-control" id="" name="image" >
                  </div>


                  <div class="form-group">
                    <label for="">Description</label>
                     <textarea class="form-control" id="inputExperience" name="description" placeholder="Enter Description.."></textarea>

                  </div>
                  <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" class="form-control" id="" name="memoriesdate" >
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
<!-- End of Modal view -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('public/students/'.$dailystudentreport->image) }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $dailystudentreport->name}}</h3>

                <p class="text-muted text-center">

                </p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>AGE:</b> <a class="float-right">{{ $dailystudentreport->age}}</a>
                  </li>

                </ul>

                 <a class="btn btn-primary btn-block" href="" data-toggle="modal"  data-target="#modal-lg">Add Memories</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item">
                    <a class="nav-link active" href="#activity" data-toggle="tab">Memories</a>
                  </li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Daily Report</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Send Message</a></li>

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        @if(!empty($memories))
                            @foreach($memories as $memory)
                                <!-- post -->
                                    <div class="post">
                                          <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="{{ asset('public/students/'.$dailystudentreport->image) }}" alt="user image">
                                            <span class="username">
                                              <a href="#">{{ $memory->header }}</a>
                                              </a>
                                               <a href="{{ url('admin/memories/delete', $memory->id) }}" class="float-right btn-tool"><i class="fas fa-trash-alt"></i></a>
                                               <a href="{{ url('admin/memories/show', $memory->id) }}" class="float-right btn-tool"><i class="fa fa-pencil-alt"></i></a>
                                            </span>
                                          </div>
                                          <img height="250px" width="750px"  src="{{ asset('public/memories/'.$memory->image) }}" alt="user image">
                                          <!-- /.user-block -->
                                          <p>
                                            {{ $memory->description }}
                                          </p>
                                          <p>
                                            Date: {{ $memory->memoriesdate }}
                                          </p>
                                    </div>
                                <!-- post end -->
                            @endforeach
                        @endif
                    </div>

                  <!-- Timeline msges -->
                    <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                        <ul class="timeline timeline-inverse">
                          <!-- timeline time label -->
                          <li class="time-label">
                            <span class="bg-danger">
                             {{ Carbon\Carbon::now()->format('d-m-Y') }}
                            </span>
                          </li>
                          <!-- /.timeline-label -->
                          <!-- timeline item -->
                          <li>
                            <i class="fas fa-envelope bg-primary"></i>

                            <div class="timeline-item">
                              <span class="time"><i class="far fa-clock"></i> {{ Carbon\Carbon::now()->toTimeString() }}</span>

                              <h3 class="timeline-header"><a href="#">DayCare Team</a> sent you an Message</h3>

                              <div class="timeline-body">
                                <form role="form" method="post" action="" enctype="multipart/form-data">
                                     <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                      <div class="form-group">
                            <label for="inputExperience" class="col-sm-2 control-label">Message:</label>

                            <div class="col-sm-10">
                              <textarea class="form-control" id="inputExperience" placeholder="Type Message.."></textarea>
                            </div>
                          </div>
                                       <input type="submit" class="btn btn-primary toastrDefaultSuccess" value="SEND"> </button>
                                    </form>
                              </div>

                            </div>
                          </li>

                          <!-- END timeline item -->

                        </ul>
                    </div>
                  <!-- End of timeline msges -->

                    <!-- Settings -->
                      <div class="tab-pane" id="settings">
                        <form class="form-horizontal" method="POST" action="{{ url('admin/daily-reports/store') }}">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                          <div class="form-group">
                            <div class="col-sm-10"><label for="inputName" class="col-sm-2 control-label">Date:</label>
                              <input type="date" class="form-control" id="inputName" name="report_date">
                            </div>
                          </div>
                          <div class="form-group">


                            <div class="col-sm-10"><label for="inputName" class="col-sm-2 control-label">From:</label>
                              <input type="time" class="form-control" id="inputName" name="from_time">
                            </div>
                          </div>
                          <div class="form-group">


                            <div class="col-sm-10"><label for="inputName" class="col-sm-2 control-label">To:</label>
                              <input type="time" class="form-control" id="inputName" placeholder="" name="to_time">
                            </div>
                          </div>

                          @if(!empty($categories))
                          <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="inputName" placeholder="category" name="category">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                          </div>
                          @endif

                          <div class="form-group">
                            <label for="inputExperience" class="col-sm-2 control-label">Description</label>

                            <div class="col-sm-10">
                              <textarea class="form-control" id="inputExperience" placeholder="Description" name="description"></textarea>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputSkills" class="col-sm-2 control-label">Overall Mood</label>

                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="inputSkills" placeholder="Overall Mood" name="mood">
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    <!-- Settings end -->
                  </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

@endsection
