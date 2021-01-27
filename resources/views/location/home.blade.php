@extends('layouts.v_template')

@section('content')
    
<div class="">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <a href="/location/add" class="btn btn-primary ">New Item</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Country</th>
                    <th>Province</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Postal_code</th>
                    <th>Longtitude</th>
                    <th>Latitude</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @php
                         $no = 1;
                         @endphp
                      @foreach ($location as $data_location)
                      
                      <tr>
                      
                    <td>{{ $no++ }}</td>  
                    <td>{{ $data_location->country }}</td>  
                    <td>{{ $data_location->province }}</td>  
                    <td>{{ $data_location->city }}</td>  
                    <td>{{ $data_location->address }}</td>  
                    <td>{{ $data_location->postal_code }}</td>  
                    <td>{{ $data_location->longtitude }}</td>  
                    <td>{{ $data_location->latitude }}</td>  
                    <td>
                      <a href="{{url('location/'.$data_location->id.'/edit/') }}">
                        <button class="btn btn-warning btn-sm text-white">
                            <i class="icon icon ion ion-edit"></i> Edit

                        </button>
                       </a>
                       <form action="{{ route('location.destroy', $data_location->id) }}" method="POST">
                        @method('delete')
                        @csrf

                        <button type="submit" class="btn btn-danger btn-sm mt-3 btn-100" onclick="return confirm('Apakah anda yakin ingin menghapus ?')">
                            <i class="far fa-trash-alt"></i> Delete
                        </button>
                       </form>
                    </td>

                    
                  </tr>
                  @endforeach
                  </tbody>
                  {{-- <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot> --}}
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
  