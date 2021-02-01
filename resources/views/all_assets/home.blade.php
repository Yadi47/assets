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
                          
                      
                    <!-- <td>{{ $no++ }}</td>  
                    <td>{{ $data_asset->code }}</td>  
                    <td>{{ $data_asset->name }}</td>  
                    <td>{{ $data_asset->  }}</td>  
                    <td>{{ $data_asset-> }}</td>  
                    <td>{{ $data_asset-> }}</td>      
                    <td>{{ $data_asset-> }}</td>  
                    <td>{{ $data_asset-> }}</td>  
                    <td>{{ $data_asset-> }}</td>  
                    <td>{{ $data_asset-> }}</td>  
                    <td>{{ $data_asset-> }}</td>  
                    <td>{{ $data_asset-> }}</td>  
                    <td>{{ $data_asset-> }}</td>   -->

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

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script>
         var route_url = 'assets';
        $(document).ready(function () {
            var dataTree = [];
        $.ajax({
            type: 'GET',
            url: '{{ route('asset.gettree') }}',
            dataType: 'json',
            async: false,
            success: function (data) {
                dataTree = data
            },
            error: function (data) {
                $.alert('Failed Get Data!');
                console.log(data);
            }
        });
            $('#treeview').jstree({
                'core': {
                    "animation": 0,
                    "check_callback": true,
                    "themes": {
                        "stripes": true
                    },
                    'data' : dataTree
                },
                plugins: ["wholerow", "contextmenu"],
                contextmenu: {
                    items: customMenu,
                }
            }).bind("select_node.jstree", function (e, data) {
                // var href = data.node.a_attr.href;
                // document.location.href = href;
            });

            function customMenu(node) {
            // The default set of all items
            var items = {
                detail: { // The "detail" menu item
                    label: "Detail",
                    action: function () {
                        var href = node.a_attr.show;
                        document.location.href = href;
                    }
                },
                edit: { // The "edit" menu item
                    label: "Update",
                    action: function () {
                        var href = node.a_attr.edit;
                        document.location.href = href;
                    }
                },
                delete: { // The "delete" menu item
                    label: "Delete",
                    action: function () {
                        var id = node.id;
                        deleteData(id);
                    }
                },
            };

            if ($(node).hasClass("folder")) {
                // Delete the "delete" menu item
                delete items.deleteItem;
            }

            return items;
        }
        });
    </script>

@endpush
  