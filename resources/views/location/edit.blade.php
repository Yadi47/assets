@extends('layouts.v_template')
@section('content')
<div class="card card-primary col-6 ml-4">
    <div class="card-header">
      <h3 class="card-title">Add Location</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="post" action="{{ route('location.store', $locations->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="country">Country</label>
          <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" value="{{ $locations->country }}">
        </div>
        <div class="form-group">
          <label for="province">Province</label>
          <input type="text" class="form-control" id="province" name="province" placeholder="Enter Province" value="{{ $locations->province }}">
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" value="{{ $locations->city }}">
          </div>
          <div class="form-group">
              <label for="addres">Address</label>
              <textarea name="address" id="address" cols="30" rows="10" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="postal_code">Postal Code</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Enter Postal Code" value="{{ $locations->postal_code }}">
          </div>  
          <div class="form-group">
            <label for="longtitude">Longtitude</label>
            <input type="text" class="form-control" id="longtitude" name="longtitude" placeholder="Enter Longtitude" value="{{ $locations->longtitude }}">
          </div>
          <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Enter Latitude" value="{{ $locations->latitude }}">
          </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('location.home') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
      </div>
    </form>
  </div>
  <!-- /.card -->
  @endsection