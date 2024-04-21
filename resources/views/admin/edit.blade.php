@extends('layouts.main')


@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="card">
                <div class="card-body">
                    <h4>Edit Employe</h4>
                    <form id="updateform" action="{{ route('admin.update') }}" method="post">
                        @csrf

                        <div id="validation-errors"></div>
                        <div id="successMsg"></div>

                        <input type="hidden" name="ueid" id="ueid" value="{{ $edits->id }}">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input type="text" class="form-control" name="fullname" id="fullname"
                                aria-describedby="emailHelp" value="{{ $edits->name }}">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div></br>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Email or Address</label>
                            <input type="email" class="form-control" name="email" id="email"
                                aria-describedby="email" value="{{ $edits->email }}">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div></br>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone no</label>
                            <input type="number" class="form-control" name="number" id="number"
                                aria-describedby="email" value="{{ $edits->phone }}">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div></br>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Department</label>
                            <select class="form-control" name="department" id="department" aria-describedby="department">
                                <option value="{{ optional($edits->department)->id }}">
                                    {{ optional($edits->department)->department_name }}</option>
                                @foreach ($departments as $department)
                                    @php
                                        $isSelectedDepartment = $department->id == optional($edits->department)->id;
                                    @endphp

                                    @unless ($isSelectedDepartment)
                                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                    @endunless
                                @endforeach
                            </select>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div></br>



                        <div class="form-group">
                            <label for="exampleInputEmail1">Skills</label>
                            <select class="tags form-control" id="skills" name="skills[]" multiple="multiple">

                                @foreach ($staticskills as $staticskill)
                                    @php
                                        $isSelected = in_array($staticskill, array_column($edits->skill->toArray(), 'skill'));
                                    @endphp
                                    <option class="form-control" value="{{ $staticskill }}"
                                        {{ $isSelected ? 'selected' : '' }}>{{ $staticskill }}</option>
                                @endforeach
                            </select>

                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div></br>



                        <button type="submit" class="btn btn-primary px-5" id="updatemploye">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#updateform').submit(function(e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var formData = new FormData(this);
            my_ajax(url, formData, 'post', function(res) {}, true);

        });
    </script>
    <script>
        $('#skills').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>
@endsection
