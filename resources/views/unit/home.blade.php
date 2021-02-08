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
                            <h1><i class="fab fa-trello"></i>
                            <span class="brand-text font-weight-light" style="font-size:30px;"> <b> Unit </b></span>
                                    </h1> 
                                </a>
                            </div>
                          </div>
                         </h3>
                      </div>

               <!-- /.card-header -->
               <div class="card-body">
               <a href="{{route('unit.form')}}">
              <button class="btn btn-sm btn-info float-right">
                 <i class="icon ion ion-ios-plus-outline"></i>
                   New Data
                    </button> 
                      </a> 
                      </div> 

              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Code Unit</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>remarks</th>
                    <th>other</th>
                    <th>action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @php
                         $no = 1;
                         @endphp
                      @foreach ($unit as $data_unit)
                      
                      <tr>
                      
                    <td>{{ $no++ }}</td>  
                    <td>{{ $data_unit->unit_code }}</td> 
                    <td>{{ $data_unit->unit_name }}</td>  
                    <td>{{ $data_unit->description }}</td>  
                    <td>{{ $data_unit->unit_remarks }}</td>  
                    <td>{{ $data_unit->unit_other }}</td>  

                    <td>
                      <img width="70"  src="{{ asset('images/type/'.$data_unit->image) }}" alt="profile">
                    </td>
                    <td>
                      <a href="{{url('unit/'.$data_unit->id.'/edit/') }}">
                        <button class="btn btn-warning btn-sm text-white">
                            <i class="icon icon ion ion-edit"></i> Edit

                        </button>
                       </a>
                       <form action="{{ route('type.destroy', $data_unit->id) }}" method="POST">
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

  