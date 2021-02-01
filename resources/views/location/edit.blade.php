@extends('layouts.v_template')
@section('content')
<div class="card card-primary col-6 ml-4">
    <div class="card-header">
      <h3 class="card-title">Add Location</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="post" action="{{ route('location.update', $locations->id) }}" >
        @csrf
        @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="country">Country</label>
          <input type="text" class="form-control{{ $errors->has('country') }}" id="country" name="country" placeholder="Enter Country" value="{{ $locations->country }}">
          @if ($errors->has('country'))
              <small class="text-danger">{{ $errors->first('country') }}</small>
          @endif
        </div>
        <div class="form-group">
          <label for="province">Province</label>
          <input type="text" class="form-control{{ $errors->has('province') }}" id="province" name="province" placeholder="Enter Province" value="{{ $locations->province }}">
          @if ($errors->has('province'))
              <small class="text-danger">{{ $errors->first('province') }}</small>
          @endif
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control{{ $errors->has('city') }}" id="city" name="city" placeholder="Enter City" value="{{ $locations->city }}">
            @if ($errors->has('city'))
              <small class="text-danger">{{ $errors->first('city') }}</small>
          @endif
          </div>
          <div class="form-group">
              <label for="addres">Address</label>
              <textarea name="address" id="address" cols="30" rows="10" class="form-control{{ $errors->has('address') }}">{{ $locations->address }}</textarea>
              @if ($errors->has('address'))
              <small class="text-danger">{{ $errors->first('address') }}</small>
          @endif
            </div>
          <div class="form-group">
            <label for="postal_code">Postal Code</label>
            <input type="text" class="form-control{{ $errors->has('postal_code') }}" id="postal_code" name="postal_code" placeholder="Enter Postal Code" value="{{ $locations->postal_code }}">
            @if ($errors->has('postal_code'))
              <small class="text-danger">{{ $errors->first('postal_code') }}</small>
          @endif
          </div>  
          <div class="form-group">
            <label for="longtitude">Longtitude</label>
            <input type="text" class="form-control{{ $errors->has('longtitude') }}" id="longtitude" name="longtitude" placeholder="Enter Longtitude" value="{{ $locations->longtitude }}">
            @if ($errors->has('longtitude'))
              <small class="text-danger">{{ $errors->first('longtitude') }}</small>
          @endif
          </div>
          <div class="form-group">
            <label for="latitude">Latitude</label>
            <input type="text" class="form-control{{ $errors->has('latitude') }}" id="latitude" name="latitude" placeholder="Enter Latitude" value="{{ $locations->latitude }}">
            @if ($errors->has('latitude'))
              <small class="text-danger">{{ $errors->first('latitude') }}</small>
          @endif
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