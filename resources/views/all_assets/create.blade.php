@extends('layouts.v_template')

@section('css')
@endsection

@section('content')

<div class="card card-primary col-8 ml-4">
    <div class="card-header">
      <h3 class="card-title">Add Asset</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="post" action="{{ route('all_assets.store') }}" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        

      <div class="row">

<div class="col-lg-8 mg-b-4">
    <div class="br-section-wrapper" style="padding: 30px 20px">
            <span class="tx-bold tx-18"></span>
            {{-- <a href="{{url('assets/create')}}"> 
            <button class="btn btn-sm btn-danger float-right"><i class="icon ion ion-ios-plus-outline"></i>
                New
                Data</button>
            </a> --}}
            <form method="POST" action="{{ route('all_assets.store') }}" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group ">
                    <label for="">Code</label>
                    <input class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" type="text" name="code"
                placeholder="input asset code" value="{{old('code')}}">
                    @if ($errors->has('code'))
                        <small class="text-danger">{{ $errors->first('code') }}</small>
                    @endif
                </div>

                <div class="form-group ">
                    <label for="">Name</label>
                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name"
                placeholder="input asset name" value="{{old('name')}}">
                    @if ($errors->has('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>

                <div class="form-group ">
                    <label for="">Purchase At</label>
                    <input class="form-control{{ $errors->has('purchase at') ? ' is-invalid' : '' }}" type="date" name="purchase at"
                placeholder="input asset purchase at" value="{{old('purchase at')}}">
                    @if ($errors->has('purchase at'))
                        <small class="text-danger">{{ $errors->first('purchase at') }}</small>
                    @endif
                </div>

                <div class="form-group ">
                    <label for="">Purchase Price</label>
                    <input class="form-control{{ $errors->has('purchase price') ? ' is-invalid' : '' }}" type="text" name="purchase price"
                placeholder="input asset purchase price" value="{{old('purchase price')}}">
                    @if ($errors->has('purchase price'))
                        <small class="text-danger">{{ $errors->first('purchase price') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Description <small>(Optional</small>)</label>
                    <textarea name="description" class="form-control" id="" cols="30" rows="3">{{old('description')}}</textarea>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    
                        <div class="custom-control custom-radio mr-2" style="display: inline">
                            <input class="custom-control-input" type="radio" name="status" id="online" {{ old('status') == '1' ? 'checked': '' }} value="1">
                            <label class="custom-control-label" for="online" style="color:green;">AKTIF</label>
                        </div>

                        <div class="custom-control custom-radio mr-2" style="display: inline">
                            <input class="custom-control-input" type="radio" name="status" id="offline"  {{ old('status') == '0' ? 'checked': '' }} value="0">
                            <label class="custom-control-label" for="offline" style="color:red;">NONAKTIF</label>
                        </div>

                        @if ($errors->has('status'))
                            <small class="text-danger">{{ $errors->first('status') }}</small>
                        @endif
                </div>

                <div class="form-group  ">
                    <label for="">Model</label>
                    <input class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}" type="text" name="model"
                placeholder="input asset model" value="{{old('model')}}">
                    @if ($errors->has('model'))
                        <small class="text-danger">{{ $errors->first('model') }}</small>
                    @endif
                </div>

                <div class="form-group ">
                    <label for="">Image</label>
                    <input class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"  type="file"
                        name="image"   value="{{old('image')}}">
                    @if ($errors->has('image'))
                        <small class="text-danger">{{ $errors->first('image') }}</small>
                    @endif
                </div>

                <div class="form-group ">
                    <label for="">Brand</label>
                    <input class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}" type="text" name="brand"
                placeholder="input asset brand" value="{{old('brand')}}">
                    @if ($errors->has('brand'))
                        <small class="text-danger">{{ $errors->first('brand') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Category</label>
                    <br>
                    <select name="category_id" class="form-control col-md-10" data-size="5">
                    <option disabled selected>Choose Category</option>
                    @foreach ($categories as $category)
                        <option data-subtext="{{ $category->name }}" value="{{ $category->id }}" {{ (old('category_id') == $category->id) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('category_id'))
                        <small class="text-danger">{{ $errors->first('category_id') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Type</label>
                    <br>
                    <select name="type_id" class="form-control col-md-10" data-size="5">
                    <option disabled selected>Choose Type</option>
                    @foreach ($types as $type)
                        <option data-subtext="{{ $type->name }}" value="{{ $type->id }}" {{ (old('type_id') == $type->id) ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('type_id'))
                        <small class="text-danger">{{ $errors->first('type_id') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Location</label>
                    <br>
                    <select name="location_id" class="form-control col-md-10" data-size="5">
                    <option disabled selected>Choose Location</option>
                    @foreach ($locations as $location)
                        <option data-subtext="{{ $location->country }}" value="{{ $location->id }}" {{ (old('location_id') == $location->id) ? 'selected' : '' }}>{{ $location->country }}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('location_id'))
                        <small class="text-danger">{{ $errors->first('location_id') }}</small>
                    @endif
                </div>

                <div class="form-group">
                    <label for="">Child Of</label>
                    <br>
                    <select name="asset_part_of" class="form-control col-md-10" data-size="5">
                    <option disabled selected>Choose Parent</option>
                    @foreach ($assets as $asset)
                        <option data-subtext="{{ $asset->name }}" value="{{ $asset->id }}" {{ (old('asset_part_of') == $asset->id) ? 'selected' : '' }}>{{ $asset->name }}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('asset_part_of'))
                    <small class="text-danger">{{ $errors->first('asset_part_of') }}</small>
                    @endif
                </div>

            <div class="form-group increment" >
                <div class="test">
                    <label for="" >Calibration</label>
                    <div class="input-group" >
                        <input type="text" class="form-control @error('calibration_name') is-invalid @enderror" name="calibration_name[]" value="{{ old('calibration_name')[0] ?? "" }}" placeholder="Input Calibration Name">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-primary btn-add">
                                <i class="fas fa-plus-square"></i>
                            </button>
                        </div>
                    </div>
                    </div>

                    
                
                <input class="form-control mt-1 {{ $errors->has('file_name') ? 'is-invalid' : ''}}" type="file" name="file_name[]" value="{{ old('file_name') }}">

                @if(old('calibration_name'))
                @foreach ((old('calibration_name')) as $calibration_name)
                    @if (($calibration_name != (old('calibration_name')[0] ?? true)) && $calibration_name != null)
                    <div class="test">
                        <div class="input-group mt-2">
                            <input type="text" class="form-control @error('calibration_name') is-invalid @enderror" name="calibration_name[]" value="{{ $calibration_name }}" placeholder="Input Calibration Name">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-danger btn-remove">
                                    <i class="fas fa-minus-square"></i>
                                </button>
                            </div>
                        </div>
                        <input class="form-control mt-1 {{ $errors->has('file_name') ? 'is-invalid' : ''}}" type="file" name="file_name[]" value="{{ old('file_name') }}">
                    </div>
                    @endif
                @endforeach
                @endif
            </div>
                    
                    <div class="clone invisible">
                        <div class="test">
                            <div class="input-group mt-3">
                                <input type="text" class="form-control @error('calibration') is-invalid @enderror" name="calibration_name[]" placeholder="Input Calibration Name">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-danger btn-remove">
                                        <i class="fas fa-minus-square"></i>
                                    </button>
                                </div>
                            </div>
                            <input class="form-control mt-1 {{ $errors->has('file_name') ? 'is-invalid' : ''}}" type="file" name="file_name[]" value="{{ old('file_name') }}">
                            </div> 
                        </div>
                    </div>
                    <div class="form-group">
                                <button class="btn   btn-success" type="submit"><i class="far fa-save"></i>
                                    Save</button>
                                <a href="{{ url('all_assets') }}"><button class="btn btn-danger" type="button">
                                <i class="far fa-arrow-alt-circle-left"></i> Cancel</button></a>
                            </div>
                        <!-- <button type="submit" class="btn btn-primary">Submit</button>
                         <a href="{{ url('all_assets') }}"><button type="button" class="btn btn-danger">Cancel</button></a> -->
                 
                 </div>
            </div>
        </div>
  </div>

<!-- br-mainpanel -->
@endsection


@push('js')
<script>
    $("#e1").select2();
    $("#checkbox").click(function () {
        if ($("#checkbox").is(':checked')) {
            $("#e1 > option").prop("selected", "selected");
            $("#e1").trigger("change");
        } else {
            $("#e1 > option").removeAttr("selected");
            $("#e1").val("");
            $("#e1").trigger("change");
        }
    });

    $("#button").click(function () {
        alert($("#e1").val());
    });

    $("select").on("select2:select", function (evt) {
        var element = evt.params.data.element;
        var $element = $(element);
        $element.detach();
        $(this).append($element);
        $(this).trigger("change");
    });

        $(function(){
            bdCustomFile.init();
        });

        $(document).ready(function(){
            $(".btn-add").click(function(){
                let markup = $(".invisible").html();
                $(".increment").append(markup);
            });
            $("body").on("click",".btn-remove", function(){
                $(this).parents(".test").remove();
            })
        })
    
</script>

    @if (old('privileges'))
        <script>
        $("#e1").val([
                @foreach (old('privileges') as $privilege_selected)
                    {!! $privilege_selected !!},  
                @endforeach 
        ]);
        </script>
    @endif
@endpush