@extends('layouts.v_template')
@section('content')
<div class="card card-primary col-6 ml-4">
    <div class="card-header">
      <h3 class="card-title">Edit Type</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="post" action="{{ route('category.update', $categories->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="input" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $categories->name }}">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="{{ $categories->description }}">
        </div>
       
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ url('category') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
      </div>
    </form>
  </div>
  <!-- /.card -->
  @endsection