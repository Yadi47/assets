@extends('layouts.v_template')


<style>
    .jstree-themeicon-custom{
        background-size: contain !important;
    }
    .treeview{
    display:none;
 }
    .data{
     margin-left: 300px;
     }
                    
</style>

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
<div class="br-mainpanel">
    <div class="br-pageheader">
        <div>
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="index.html">{{config('app.name')}}</a>
            </nav>

        </div>
    </div><!-- br-pageheader -->


    <div class="br-pagebody">

        <div class="row">

            <div class="col-lg-12 mg-b-20">
                <div class="br-section-wrapper" style="padding: 35px 40px">
                    <div style="align">
                        <span class="tx-bold tx-18"><i class="fas fa-archive"></i>  </span>
                        <a href="{{route('all_assets.create')}}">
                            <button class="btn btn-sm btn-info float-right"><i
                                    class="icon ion ion-ios-plus-outline"></i>
                                New
                                Data</button>
                        </a>
                    </div>
                    <hr>
                    @if(session()->has('create'))
                    <div class="alert alert-success wd-50p">
                        {{ session()->get('create') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @if(session()->has('update'))
                    <div class="alert alert-warning wd-50p">
                        {{ session()->get('update') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    @endif

                    @if(session()->has('delete'))
                    <div class="alert alert-danger wd-50p">
                        {{ session()->get('delete') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            @if(!($asset->count() != 0))
                    
                     
                    <img class="data" src="{{ asset('images/no_data.jpg') }}" alt="" width="40%"  >
                     @endif
                    <div id="treeview">
                    
                    </div>
                </div>
            </div>
        </div>
                    

    </div><!-- br-pagebody -->

    @push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script>
         var route_url = 'assets';
        $(document).ready(function () {
            var dataTree = [];
        $.ajax({
            type: 'GET',
            url: '{{ route('all_assets.gettree') }}',
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
                add: { // The "detail" menu item
                    label: "Add Child",
                    action: function () {
                        var href = node.a_attr.add_child;
                        document.location.href = href;
                    }
                },
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

    
</div><!-- br-mainpanel -->


@endsection