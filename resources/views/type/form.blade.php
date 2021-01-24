@extends('layouts.v_template')
@section('content')
<div class="card card-primary col-6 ml-4">
    <div class="card-header">
      <h3 class="card-title">Add Type</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="post" action="{{ route('type.store') }}" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="input" class="form-control" id="name" name="name" placeholder="Enter Name">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="Enter Image">
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ url('type') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
      </div>
    </form>
  </div>
  <!-- /.card -->
  @endsection