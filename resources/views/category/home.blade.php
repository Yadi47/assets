@extends('layouts.v_template')

@section('content')
    
<div class="">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="page-header">
                <div class="page-title">
                    <h3><i data-feather="archive"></i> </h3>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-12 mg-b-20">
                    <div class="card">
                        <div class="br-section-wrapper" style="padding: 30px 20px">
                            <div>
                            <h1><i class="fas fa-swatchbook nav-icon"></i>
                            <span class="brand-text font-weight-light" style="font-size:30px;"> <b> Category </b></span>
                                 <a href="{{ route('all_assets.create') }}"> 
                                    
                                    </h1> 
                                </a>
                            </div>
                          </div>
                        </h3>
                      </div>

              <!-- /.card-header -->
              <div class="card-body">
              <button class="btn btn-sm btn-info float-right">
                 <i class="icon ion ion-ios-plus-outline"></i>
                   New Data
                    </button>  
                      </div>

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @php
                         $no = 1;
                         @endphp
                      @foreach ($category as $data_category)
                      
                      <tr>
                      
                    <td>{{ $no++ }}</td>  
                    <td>{{ $data_category->name }}</td>  
                    <td>{{ $data_category->description }}</td>  
                    <td>
                      <a href="{{url('category/'.$data_category->id.'/edit/') }}">
                        <button class="btn btn-warning btn-sm text-white">
                            <i class="icon icon ion ion-edit"></i> Edit

                        </button>
                       </a>
                       <form action="{{ route('category.destroy', $data_category->id) }}" method="POST">
                        @method('delete')
                        @csrf

                        <button type="submit" class="btn btn-danger btn-sm mt-3 btn-100" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $data_category->name }}?')">
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
  