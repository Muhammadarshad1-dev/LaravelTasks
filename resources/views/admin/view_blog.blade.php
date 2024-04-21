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
                                <a href="{{ route ('admin.allblog')}}" class="btn btn-info" style="float: right;">Back</a>
                                <h4 class="mb-0">View Blog</h4>

                                </div>
                                <hr />
                                <div class="table-responsive">
                                    <table class="table  table-striped table-bordered">
                                        <tr>
                                            <th>Title</th>
                                            <td>{{ucwords($blog->title)}}</td>
                                        </tr>


                                        <tr>
                                            <th>Category</th>
                                            <td>
                                        <input type="text" class="form-control" readonly value="{{ucwords($blog->blog_categorys->category_name)}}">
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Tags</th>
                                            <td>
                                            <select class="tags form-control" id="tags" multiple="multiple">
                                            @foreach ($blog->blog_tags as $blog_tags)
                                            <option selected="selected" value="{{ $blog_tags->tag->name}}">{{ucwords($blog_tags->tag->name)}}</option>
                                            @endforeach
                                            </select>
                                            </td>
                                        </tr>


                                        <tr>
                                            <th>Description</th>
                                            <td>

                <textarea type="text" id="description" name="description" readonly>{{ucwords($blog->description)}}</textarea>
                </td>
                                        </tr>


                                        <tr>
                                            <th>Images</th>
                                            <td>
                                                    @foreach ($blog->blog_images as $blog_images)
                                                    <div class="img-wrap">
                                                        <img src=" {{ check_file($blog_images->image_name) }}" id="blog-img"
                                                            alt="blog-images">
                                                        @endforeach
                                                </div>
                                            </td>
                                        </tr>


                                        </tr>
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
    <script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js'
    referrerpolicy="origin">

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


    <script>
    $('#tags').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
        tags: true
    });

    $("#tags").select2({disabled:'disabled'});
</script>


        <script>
            tinymce.init({
                selector: "#description",
                menubar: false,
                toolbar: false,
                readonly : 1
            });
        </script>
    @endsection
