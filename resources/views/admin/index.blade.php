@extends('layouts.newadmin')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>15</h3>

                <p>Activities</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>125<sup style="font-size: 20px">%</sup></h3>

                <p>Happy Clients</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>144</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">

              <!-- Events -->
              <div class="card">
              <div class="card-header">

                <h3 class="card-title">Events</h3>

                <div class="card-tools">
                  <div class="btn-group">
                    <button type="button" class="btn btn-tool btn-sm dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-bars"></i></button>
                    <div class="dropdown-menu float-right" role="menu">
                      <a href="{{ route('admin.events.index')}}" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>

                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                  <button type="button" class="btn btn-tool" data-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                  @if(!empty($events))
                            @foreach($events as $memory)
                                <!-- post -->
                                    <div class="post">
                                          <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                            <span class="username">
                                              <a href="#">{{ $memory->name }}</a>
                                              </a>
                                              <!--  <a href="" class="float-right btn-tool"><i class="fas fa-trash-alt"></i></a>
                                               <a href="" class="float-right btn-tool"><i class="fa fa-pencil-alt"></i></a> -->
                                            </span>
                                          </div>
                                          <img height="250px" width="570px"  src="{{ asset('/events/'.$memory->image) }}" alt="user image">
                                          <!-- /.user-block -->
                                          <p>
                                            {{ $memory->description }}
                                          </p>
                                          <p>
                                            Date: {{ $memory->organizeddate }}
                                          </p>
                                    </div>
                                <!-- post end -->
                            @endforeach
                        @endif
              </div><!-- /.card-body -->
            </div>
           <!-- End Of Events -->
          </section>


          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">




            <!-- Calendar -->
            <div class="card bg-gradient-success" style="border: #A84141 10px solid;">
              <div class="card-header no-border" >

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Noticeboard
                </h3>
                <!-- tools card -->
                <div class="card-tools" >
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                      <i class="fas fa-bars"></i></button>
                    <div class="dropdown-menu float-right" role="menu">
                      <a href="{{ route('admin.noticeboard.index')}}" class="dropdown-item">Add new Notice </a>
                      <a href="#" class="dropdown-item">Clear Notice</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%">


                 <div class="tab-pane" id="timeline">
                    @if(!empty($notice))
                            @foreach($notice as $memory)
                    <!-- The timeline -->
                        <ul class="timeline timeline-inverse">
                          <!-- timeline time label -->
                          <li class="time-label">
                            <span class="bg-danger">
                             {{ $memory->todaysdate }}
                             </span>
                            <!--  <p align="right">

                                             <a style="color: black;" href="{{ route('admin.noticeboard.show',$memory->id)}}"  >
                        <i class="fas fa-edit"></i>
                      </a>


                      <a style="color: black;" href="javascript:void(0)" onclick="$(this).parent().find('form').submit()" >
                        <i class="fas fa-trash-alt"></i>
                      </a>

                       <form action="{{  route('admin.noticeboard.destroy',$memory->id)}}" method="post">
                        @method('DELETE')

                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      </form>




                            </p> -->

                          </li>
                          <!-- /.timeline-label -->
                          <!-- timeline item -->
                          <li>
                            <i class="fas fa-envelope bg-primary"></i>

                            <div class="timeline-item">
                              <span class="time"><i class="far fa-clock"></i> {{ $memory->writetime }}</span>

                              <h3 class="timeline-header">

                              <span>{{$memory->header}}

                              </span></h3>

                              <div class="timeline-body">
                                {{$memory->noticedescription}}
                              </div>

                            </div>
                          </li>

                          <!-- END timeline item -->

                        </ul>
                              <!-- post end -->
                            @endforeach
                        @endif
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection
