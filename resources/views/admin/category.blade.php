@extends('layouts.main')

@section('content')
    <!--page-wrapper-->
    <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="card">
                    <div class="card-body">
                        <h4>{{$title ?? ''}}</h4>
                        <form class="row g-3 category_form" id="addcategory" method="post"
                            action="{{ route('admin.addcategory') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                             <input type="hidden" name="ecid" value="{{$edit->id ?? ''}}">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Category name</label>
                                <input type="text" class="form-control" name="category" id="category" value="{{$edit->category_name ?? ''}}"
                                    placeholder="Category" required>
                            </div>


                            <div class="col-12">
                                <button type="submit" class="btn btn-info">{{$button ?? 'Add Category'}}</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <!--end page-content-wrapper-->
        </div>
        <!--end page-wrapper-->
    @endsection






    @section('script')
        <script>
            $('.category_form').submit(function(e) {
                e.preventDefault();
                $('#addcategory').prop('disabled', true);
                var url = $(this).attr('action');
                var formData = new FormData(this);
                my_ajax(url, formData, 'post', function(res) {}, true);
                $('#addcategory').prop('disabled', false);
            });
        </script>
    @endsection
