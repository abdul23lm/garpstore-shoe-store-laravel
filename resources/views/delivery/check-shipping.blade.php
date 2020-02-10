@extends('delivery.layouts.admin-template')

@section('content-wrapper')
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $title }}
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">

          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-body">
              <form method="post" action="{{ action('DeliveryController@processShipping') }}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <!-- text input -->
                <div class="form-group">
                  <label>Origin</label>
                  <select id="origin" class="form-control" name="origin">
                    <option selected="selected" value="">Pilih Origin</option>
                    @foreach($city as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Destination</label>
                  <select id="destination" class="form-control" name="destination">
                    <option selected="selected" value="">Pilih Destination</option>
                    @foreach($city as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Weight</label>
                  <input type="text" name="weight" class="form-control" placeholder="Enter ...">
                </div>

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>

              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection
