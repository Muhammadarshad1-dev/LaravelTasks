@extends('layouts.main')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="card">
                <div class="card-body">
                    <h4>Add Employe</h4>

                    <!-- Add new employe form -->
                    <form class="row g-3 employeform" action="{{ route('admin.addemploye') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <input type="hidden" name="editid" value="{{ $edits->id ?? '' }}" </div>

                            <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input type="text" class="form-control" name="fullname" id="fullname"
                                    aria-describedby="fullnameHelp" value="{{ $edits->name ?? '' }}"
                                    placeholder="Write a name..." required>
                                <small id="fullnameHelp" class="form-text text-muted"></small>
                            </div></br>

                            <!-- Email Field -->
                            <div class="form-group">
                                <label for="email">Email or Address</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    aria-describedby="emailHelp" value="{{ $edits->email ?? '' }}"
                                    placeholder="Email or Address" required>
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div></br>


                            <!-- Phone No Field -->
                            <div class="form-group">
                                <label for="number">Phone no</label>
                                <input type="number" class="form-control" name="number" id="number"
                                    aria-describedby="numberHelp" value="{{ $edits->phone ?? '' }}"="Phone no"
                                    pattern="[789][0-9]{9}">
                                <small id="numberHelp" class="form-text text-muted"></small>
                            </div></br>




                            <div class="form-group">
                                <label for="exampleInputEmail1">Department</label>
                                <select class="form-control" name="department" id="department" aria-describedby="department"
                                    required>
                                    @if (!isset($edits))
                                        <!-- Display "Select Department" only when adding a new entry -->
                                        <option value="" selected>Select Department</option>
                                    @endif

                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ isset($edits) && $edits->dept_id == $department->id ? 'selected' : '' }}>
                                            {{ $department->department_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <small id="departmentHelp" class="form-text text-muted"></small>
                            </div></br>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Skills</label>
                                <select class="tags form-control" id="skills" name="skills[]" multiple="multiple"
                                    required>
                                    @if (!isset($edits))
                                        <!-- Display "Select Skill" only when adding a new entry -->
                                    @endif

                                    @foreach ($staticskills as $staticskill)
                                        @php
                                            // Check if $edits is set and if the static skill is in the array of skills for the entity
                                            $isSelected = isset($edits) && $edits->skill && in_array($staticskill, array_column($edits->skill->toArray(), 'skill'));
                                        @endphp
                                        <option class="form-control" value="{{ $staticskill }}"
                                            {{ $isSelected ? 'selected' : '' }}>
                                            {{ $staticskill }}
                                        </option>
                                    @endforeach
                                </select>


                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div></br>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary px-5"
                                    id="update_profile">{{ $button ?? 'Add' }}</button>
                            </div>

                    </form>
                    <!-- end employe form -->
                </div>
            </div>
        </div>
    </div>
@endsection








@section('script')
    <script>
        $('.employeform').submit(function(e) {
            e.preventDefault();
            $('#addemploye').prop('disabled', true);
            var url = $(this).attr('action');
            var formData = new FormData(this);
            my_ajax(url, formData, 'post', function(res) {}, true);
            $('#addemploye').prop('disabled', false);
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
