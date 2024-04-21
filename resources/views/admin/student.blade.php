@extends('layouts.main')

@section('content')
<div class="page-content-wrapper">
<div class="page-content">
<div class="card">
<div class="card-body">
<h4>{{$title ?? ''}}</h4>

<form class="row g-3 studentform" action="{{ route('admin.addstudents') }}" method="post">
@csrf

<input type="hidden" name="sid" value="{{ $student->id ?? ''}}">


<div class="form-group">
<label for="fullname">Full Name</label>
<input type="text" class="form-control" name="name" id="name" aria-describedby="fullnameHelp" value="{{ $student->name ?? ''}}" placeholder="Write a name..." required>
<small id="fullnameHelp" class="form-text text-muted"></small>
</div></br>

<!-- Email Field -->
<div class="form-group">
<label for="email">Email or Address</label>
<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{ $student->email ?? ''}}" placeholder="Email or Address" required>
<small id="emailHelp" class="form-text text-muted"></small>
</div></br>


<div class="form-group">
<label for="exampleInputEmail1">Department</label>
<select class="form-control" name="department" id="department" aria-describedby="department" required>
  {{ isset($student) ? '<option value="' . $student->dept_id . '">' . $student->department_name . '</option>' : '<option value="" selected>Select Department</option>' }}


    @foreach($departments as $department)
        <option value="{{ $department->id }}" {{ (isset($student) && $student->dept_id == $department->id) ? 'selected' : '' }}>
            {{ $department->department_name }}
        </option>
    @endforeach

</select>


<small id="departmentHelp" class="form-text text-muted"></small>
</div></br>

<div class="form-group">
<button type="submit" class="btn btn-primary id="update_profile">{{$button ?? 'Add'}}</button>
</div></br>

</form>
</div>
</div>
</div>
</div>
@endsection






@section('script')
<script>
    $('.studentform').submit(function(e) {
        e.preventDefault();
        $('#addstudents').prop('disabled', true);
        var url = $(this).attr('action');
        var formData = new FormData(this);
        my_ajax(url, formData, 'post', function(res) {
        },true);
        $('#addstudents').prop('disabled', false);
    });
</script>
@endsection
