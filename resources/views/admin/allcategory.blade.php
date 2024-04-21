@extends('layouts.main')

@section('content')
    <!--page-wrapper-->
    <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <a href="{{ route ('admin.category')}}" class="btn btn-success" style="float: right;">Add Category</a>
                                    <h4 class="mb-0">All Categories</h4>
                                </div>
                                <hr />
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                        <div id="DeleteMsg"></div>
                                        <thead>
                                            <tr>
                                                <th>S#No</th>
                                                <td>Category</td>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                        </tbody>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
            <!--end page-content-wrapper-->
        </div>
        <!--end page-wrapper-->
    @endsection


    @section('script')
        <script>
            $(function () {
            var table = $('#example2').DataTable({
            processing: true,
            serverSide: true,
            ajax:"{{route('admin.allcategory')}}",
            columns: [
            {data: 'id', name: 'id'},
            {data: 'category_name', category_name: 'category_name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]

            });

            });
        </script>
    @endsection
