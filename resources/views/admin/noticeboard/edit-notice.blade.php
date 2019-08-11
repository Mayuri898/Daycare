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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Noticeboard</li>
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
              <h4 class="modal-title">Edit Notice</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>
                 <form role="form" method="POST" action="{{ url('/admin/noticeboard/update', $notice->id )}}" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input name="_method" type="hidden" value="PUT">

                <div class="card-body">
                  <div class="form-group">
                    <label for="">Header</label>
                    <input type="text" class="form-control" id="" name="header" value="{{ $notice->header }}">
                  </div>
                  <div class="form-group">
                    <label for="">Date</label>
                    <input type="date" class="form-control" id="" name="todaysdate" value="{{ $notice->todaysdate }}">
                  </div>
                   <div class="form-group">
                    <label for="">Time</label>
                    <input type="time" class="form-control" id="" name="writetime" value="{{ $notice->writetime }}">
                  </div>





                  <div class="form-group">
                    <label for="">Description</label>
                     <textarea class="form-control" id="inputExperience" name="description" placeholder="Enter Description..">{{ $notice->description }}</textarea>

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
