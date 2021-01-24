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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Purchase_at</th>
                    <th>Purchase_price</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Model</th>
                    <th>Image</th>
                    <th>Brand</th>
                    <th>Category_id</th>
                    <th>asset_part_of</th>
                    <th>type_id</th>
                    <th>location_id</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                     
                      @foreach ($assets as $data_asset)
                          
                      
                    <td></td>  
                    <td>{{ $data_asset->code }}</td>  
                    <td>{{ $data_asset-> }}</td>  
                    <td>{{ $data_asset-> }}</td>  
                    <td>{{ $data_asset-> }}</td>  
                    <td>{{ $data_asset-> }}</td>  
                    <td>{{ $data_asset-> }}</td>  
                    <td>{{ $data_asset-> }}</td>  
                    <td>{{ $data_asset-> }}</td>  
                    <td>{{ $data_asset-> }}</td>  
                    <td>{{ $data_asset-> }}</td>  
                    <td>{{ $data_asset-> }}</td>  
                    <td>{{ $data_asset-> }}</td>  

                    @endforeach

                  </tr>
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
  