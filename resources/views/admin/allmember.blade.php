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
                                    {{-- <a class="btn btn-primary" href="{{ route('admin.member') }}"
                                        style="float: right">Add</a> --}}
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleVerticallycenteredModal" style="float: right;">Add
                                        Members</button>
                                    <h4 class="mb-0">All Members</h4>

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
                                                <th>Skill</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($member as $k => $members)
                                                <tr>
                                                    <td>{{ $k + 1 }}</td>
                                                    <td>{{ $members->name }}</td>
                                                    <td>{{ $members->email }}</td>
                                                    <td>
                                                        @foreach ($members->memberskill as $memberskills)
                                                            <p>{{ $memberskills->skill }}</p>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);"
                                                            data-url="{{ route('admin.deletemember', $members->id) }}"
                                                            onclick="ajaxRequest(this)" class="btn btn-danger">Delete</a>


                                                        <Button class="btn btn-primary memb-btn" data-bs-toggle="modal"
                                                            data-bs-target="#exampleVerticallycenteredModalEditMembers"
                                                            data-memb-id="{{ $members }}">Edit</button>
                                                        {{-- <a href="{{ route('admin.editmember', $members->id) }}"
                                                            class="btn btn-primary">Edit</a> --}}
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Skill</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
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




        <div class="col">
            <!-- Button trigger modal -->
            <!-- Modal -->
            <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Members</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form class="row g-3 memberform" id="memberform" method="post"
                                action="{{ route('admin.addmember') }}">
                                @csrf

                                <div class="col-md-12">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter you name"
                                        name="name" required>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" type="email" placeholder="Email or Address" name="email"
                                        required>
                                </div>


                                <div class="form-group">
                                    <label>Skills</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="skill[]" placeholder="Skill"
                                            aria-label="Skill" aria-describedby="button-addon2" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-success add_button" type="button"><i
                                                    class="bx bx-plus"></i></button>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info" id="save-member">Add Member</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- modal close --}}





        {{-- Edit modal of members --}}
        <div class="col">
            <!-- Modal -->
            <div class="modal fade" id="exampleVerticallycenteredModalEditMembers" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Modal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form class="row g-3 memberform" id="memberform" method="post"
                                action="{{ route('admin.addmember') }}">
                                @csrf

                                <input type="hidden" name="ueid" id="ueid">

                                <div class="col-md-12">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" id="e_name"
                                        placeholder="Enter you name" name="name" required>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label">Email</label>
                                    <input class="form-control" type="email" id="e_email"
                                        placeholder="Email or Address" name="email" required>
                                </div>


                                <div class="form-group edit">
                                    <label>Skills</label>
                                    <div class="input-group mb-3 ">
                                        <input type="text" class="form-control" name="skill[]" placeholder="Skill"
                                            aria-label="Skill" aria-describedby="button-addon2" id="e_skills" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-success add_button" type="button"><i
                                                    class="bx bx-plus"></i></button>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info" id="save-member">Update</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- close edit modal --}}
    @endsection






    @section('script')
        <script>
            $(document).ready(function() {
                var maxField = 10;
                var wrapper = $('.form-group');
                var fieldHTML =
                    '<div class="input-group mb-3"><input type="text" class="form-control" name="skill[]" aria-label="Skill" aria-describedby="button-addon2" value="" placeholder="Skill"/><div class="input-group-append"><button class="btn btn-danger remove_button" type="button"><i class="bx bx-minus"></i></button></div></div>'; //New input field html
                var x = 1;
                // Once add button is clicked
                wrapper.on('click', '.add_button', function() {

                    if (x < maxField) {
                        x++; //Increase field counter
                        $(this).closest('.form-group').append(fieldHTML);
                    } else {
                        alert('A maximum of ' + maxField + ' fields are allowed to be added. ');
                    }
                });

                wrapper.on('click', '.remove_button', function(e) {
                    e.preventDefault();
                    $(this).closest('.input-group').remove();
                    x--;
                });
            });
        </script>



        <script>
            $('.memberform').submit(function(e) {
                e.preventDefault();
                $('#addmember').prop('disabled', true);
                var url = $(this).attr('action');
                var formData = new FormData(this);
                my_ajax(url, formData, 'post', function(res) {}, true);
                $('#addmember').prop('disabled', false);
            });
        </script>



        <script>
            $(document).ready(function() {
                $(document).on('click', '.memb-btn', function() {
                    let data = $(this).data('memb-id');

                    var ueid = data.id;
                    $('#ueid').val(ueid);

                    var name = data.name;
                    $('#e_name').val(name);

                    var email = data.email;
                    $('#e_email').val(email);

                    var skillsdata = data.memberskill;
                    $('.edit').empty();

                    for (var i = 0; i < skillsdata.length; i++) {
                        var skillstore = skillsdata[i];
                        if (skillstore && skillstore.skill) {
                            var html = '<div class="input-group mb-3">' +
                              '<input type="text" class="form-control" name="skill[]" placeholder="Skill" aria-label="Skill" aria-describedby="button-addon2"value="' + skillstore.skill + '">' +
                                '<div class="input-group-append">' +

                                (i == 0 ?
                                '<button class="btn btn-success add_button" type="button"><i class="bx bx-plus"></i></button>' :
                                '<button class="btn btn-danger remove_button" type="button"><i class="bx bx-minus"></i></button>'
                                ) +

                            '</div>' +
                            '</div>';

                          $('.edit').append(html);
                        }
                    }
                });
            });
        </script>




        <script>
            $(document).ready(function() {
                $('#example').DataTable();
                var table = $('#example2').DataTable({
                    lengthChange: false,
                    pageLength: 5
                });

                table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
            });
        </script>
    @endsection
