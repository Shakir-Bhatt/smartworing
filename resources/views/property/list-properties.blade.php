@extends('layouts.main')

@section('sidebar')
    @parent
@endsection
@section('custom_css')
    <style type="text/css">
        .dataTables_processing{
            color: #fff;
            background: #663299;
        }
       
    </style>

@endsection
@section('content')

     <!-- ============ Body content start ============= -->
     <div class="main-content-wrap sidenav-open d-flex flex-column">

        <div class="breadcrumb">
            <h1 class="mr-2">Properties</h1>
        </div>
        <div class="separator-breadcrumb border-top"></div>

        <div class="row mb-4">
               
            <div class="col-md-12 mb-4">
                <div class="card text-left">
                    @include('layouts.alerts')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4 class="card-title mb-3">Property Listing</h4>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="propertyTable" class="display table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>County</th>
                                        <th>Country</th>
                                        <th>Town</th>
                                        <th>Displayable Address</th>
                                        <th>Image Full </th>
                                        <th>Image Thumbnail </th>
                                        <th>Delete</th>
                                        <th>Edit</a></th>                                 
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Updated By Ajax -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of col -->

        </div>

    </div>
  
@endsection

@section('scripts')
    @parent
    <!-- page specific script -->


   <script>
   var propertyTable;
    $(function () {
        propertyTable = $('#propertyTable').DataTable({
            ajax: {
                url: APP_URL + "/property/list",
                error: function (response) {
                    console.log(response);
                }
            },
            processing: true,
            serverSide: true,
            fixedHeader: true,
            columnDefs: [{
                sortable: false,
                //targets: [3, 4, 5]
            }],
            order: [
                //[1, "desc"]
            ],

        });
    });
        
    </script>
@endsection
