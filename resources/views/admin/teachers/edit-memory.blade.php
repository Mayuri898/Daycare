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
<div>
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Memory</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>
                 <form role="form" method="POST" action="{{ url('/admin/memories/update', $memory->id )}}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input name="_method" type="hidden" value="PUT">
                  <input type="hidden" name="student_id" value="{{ $memory->student_id }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Header</label>
                    <input type="text" class="form-control" id="" name="header" value="{{ $memory->header }}">
                  </div>


                 <div class="form-group">
                    <label for="">Insert Photo </label>
                    <input type="file" class="form-control" id=""  name="image" >
                    <img  src="{{ asset('public/memories/'.$memory->image) }}" style="width: 150px;">
                  </div>


                  <div class="form-group">
                    <label for="">Description</label>
                     <textarea class="form-control" id="inputExperience" name="description" placeholder="Enter Description..">{{ $memory->description }}</textarea>

                  </div>
                  <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" class="form-control" id="" name="memoriesdate" value="{{ $memory->memoriesdate }}">
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
@endsection
