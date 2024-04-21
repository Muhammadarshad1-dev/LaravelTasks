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
                                    <button type="button" class="btn btn-primary add-employe"
                                        style="float:right;">Add</button>
                                    <h4 class="mb-0">All Employe</h4>

                                </div>
                                <hr />
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                        <div id="DeleteMsg"></div>
                                        <thead>
                                            <tr>
                                                <th>S#No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Department</th>
                                                <th>Skils</th>
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
            // $(document).ready(function() {
            //     $('#example').DataTable();
            //     var table = $('#example2').DataTable({
            //         lengthChange: false,
            //         pageLength: 5
            //     });

            //     table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
            // });


            $(document).ready(function() {
            $('#example2').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('admin.allempoye') !!}',
            columns: [
            { data: 'id', id: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'phone', name: 'phone' },
            { data: 'department_name', name: 'department_name' },
            { data: 'skills', name: 'skills' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    });

        </script>
    @endsection
