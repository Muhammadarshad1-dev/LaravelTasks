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
<a class="btn btn-primary" href="{{route('admin.student')}}" style="float: right">Add</a>

<h4 class="mb-0">All Students</h4>

</div>
<hr/>
<div class="table-responsive">
<table id="example2" class="table table-striped table-bordered" style="width:100%">
<div id="DeleteMsg"></div>
<thead>
<tr>
<th>S#No</th>
<th>Name</th>
<th>Email</th>
<th>Department</th>
<th>Action</th>
</tr>
</thead>

<tbody>
@foreach($student as $k => $students)
<tr>
<td>{{ $i +1 }}</td>
<td>{{$students->name}}</td>
<td>{{$students->email}}</td>
<td>{{optional($students->department)->department_name }}</td>
<td>
    <a href="javascript:void(0);" data-url="{{ route('admin.deletestudents', $students->id) }}" onclick="ajaxRequest(this)" class="btn btn-danger" >Delete</a>
<a href="{{ route('admin.editstudents', $students->id) }}" class="btn btn-primary">Edit</a>
</td>

</tr>
@endforeach
</tbody>
<tfoot>
<tr>
<th>Name</th>
<th>Email</th>
<th>Department</th>
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
@endsection








@section('script')
<script>
	$(document).ready(function () {
	$('#example').DataTable();
	var table = $('#example2').DataTable({
	lengthChange: false,
	pageLength: 5
	});

	table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
	});
</script>
@endsection
