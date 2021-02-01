@extends('layouts.v_template')

@section('css')
<style>
    .jstree-themeicon-custom{
        background-size: cover!important;
    }

</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
@endsection

@section('content')
<div id="content" class="main-content">
    <div class="container">
        <div class="layout-px-spacing">

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
                                <span class="tx-bold tx-18"><i class="icon ion ion-ios-speedometer tx-22"></i>
                                    </span>
                                 <a href="{{ route('all_assets.create') }}"> 
                                    <button class="btn btn-sm btn-info float-right">
                                        <i class="icon ion ion-ios-plus-outline"></i>
                                        New Data
                                    </button>
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
                                    @if ($asset->count() < 1)
                                        <img src="{{ asset('backend/images/no-data.jpg') }}" class="mx-auto d-block" width="50%" alt="">
                                    @endif
                                    <div id="treeview">
                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
</div>
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
                'data': dataTree
            },
            'plugins': ["contextmenu","wholerow"],
            'contextmenu': {
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
                    label: "Edit",
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