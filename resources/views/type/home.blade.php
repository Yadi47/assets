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
                <h3 class="card-title float-right">
                  <a href="/type/add" class="btn btn-primary ">New Item</a>
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @php
                         $no = 1;
                         @endphp
                      @foreach ($type as $data_type)
                      
                      <tr>
                      
                    <td>{{ $no++ }}</td>  
                    <td>{{ $data_type->name }}</td>  
                    <td>{{ $data_type->description }}</td>  
                    <td>
                      <img width="70"  src="{{ asset('images/type/'.$data_type->image) }}" alt="profile">
                    </td>
                    <td>
                      <a href="{{url('type/'.$data_type->id.'/edit/') }}">
                        <button class="btn btn-warning btn-sm text-white">
                            <i class="icon icon ion ion-edit"></i> Edit

                        </button>
                       </a>
                       <form action="{{ route('type.destroy', $data_type->id) }}" method="POST">
                        @method('delete')
                        @csrf

                        <button type="submit" class="btn btn-danger btn-sm mt-3 btn-100" onclick="return confirm('Apakah anda yakin ingin menghapus {{ $data_type->name }}?')">
                            <i class="far fa-trash-alt"></i> Delete
                        </button>
                       </form>
                      
                    </td>
                    

                    
                  </tr>
                  @endforeach
                  </tbody>
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

  