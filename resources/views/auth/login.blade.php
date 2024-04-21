@extends('layouts.auth')

@section('content')

<div class="form-body">
    <form class="row g-3" method="POST" action="{{ route('admin.login') }}">
        @csrf
        <div class="col-12">
            <label for="inputEmailAddress" class="form-label">Email Address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmailAddress" name="email" value="{{ old('email') }}" placeholder="Email Address">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="col-12">
            <label for="inputChoosePassword" class="form-label">Enter Password</label>
            <div class="input-group" id="show_hide_password">
                <input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            @error('error')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="col-md-6">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
            </div>
        </div>
        <div class="col-12">
            <div class="d-grid">
            <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
          </div>
        </div>
    </form>
</div>
@endsection
