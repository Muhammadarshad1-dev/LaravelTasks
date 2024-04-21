@extends('layouts.main')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="card">
                <div class="card-body">
                    <h4>{{ $title }}</h4>
                    <form class="row g-3 memberform" id="memberform" method="post" action="{{ route('admin.addmember') }}">
                        @csrf

                        <div class="form-group">
                            <input type="hidden" name="ueid" value="{{ $member->id ?? '' }}">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter you name"
                                name="name" value="{{ $member->name ?? '' }}" required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Email</label>
                            <input class="form-control" type="email" placeholder="Email or Address" name="email"
                                value="{{ $member->email ?? '' }}" required>
                        </div>


                        <div class="form-group">
                            <label>Skills</label>

                            <!-- Display an additional input field for adding a new skill -->
                            @if (isset($member) && $member->memberskill)
                                @foreach ($member->memberskill as $k => $memberskills)
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="skill[]" placeholder="Skill"
                                            aria-label="Skill" aria-describedby="button-addon2"
                                            value="{{ $memberskills->skill ?? '' }}">
                                        @if ($k == 0)
                                            <div class="input-group-append">
                                                <button class="btn btn-success add_button" type="button"><i
                                                        class="bx bx-plus"></i></button>
                                            </div>
                                        @else
                                            <div class="input-group-append">
                                                <button class="btn btn-danger remove_button" type="button"><i
                                                        class="bx bx-minus"></i></button>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            @else
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="skill[]" placeholder="Skill"
                                        aria-label="Skill" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-success add_button" type="button"><i
                                                class="bx bx-plus"></i></button>
                                    </div>
                                </div>
                            @endif
                        </div>


                        <div class="col-12">
                            <button type="submit" class="btn btn-info" id="save-member">{{ $button ?? 'Add' }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
@endsection
