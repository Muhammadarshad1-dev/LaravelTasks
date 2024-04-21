@extends('layouts.main')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Setting</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4>Update Profile</h4>
                <form class="row g-3 ajaxForm" action="{{ route('admin.update_profile') }}" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label for="inputFirstName" class="form-label">Name <span class="text-danger">*</span></label>
                        <input class="form-control" placeholder="enter name" name="name" value="{{ $edit->name ?? '' }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input class="form-control" type="email" readonly placeholder="enter email" value="{{ $edit->email ?? '' }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" name="profile_image">
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-5" id="update_profile">Update</button>
                    </div>
                </form>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-body">
                <h4>Change Password</h4>
                <form class="row g-3 ajaxForm1" action="{{ route('admin.change_password') }}" method="post">
                    @csrf
                    <div class="col-md-12">
                        <label class="form-label">Password: <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" placeholder="enter your current password" name="old_password"  required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">New Password: <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" placeholder="enter password at least 8 charactes long" min="8" name="password" required>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Confirm Password: <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" placeholder="enter confirm password at least 8 charactes long" min="8" name="password_confirmation" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-5" id="change-password" data-btnTxt="Update" data-loadText="Updating...">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $('.ajaxForm').submit(function(e) {
        e.preventDefault();
        $('#update_profile').prop('disabled', true);
        var url = $(this).attr('action');
        var formData = new FormData(this);
        my_ajax(url, formData, 'post', function(res) {
        },true);
        $('#update_profile').prop('disabled', false);
    });
    







    $('.ajaxForm1').submit(function(e) {
        e.preventDefault();
        $('#change-password').prop('disabled', true);
        var url = $(this).attr('action');
        var formData = new FormData(this);
        my_ajax(url, formData, 'post', function(res) {
        },false);
        $('#change-password').prop('disabled', false);
    });
</script>
@endsection
