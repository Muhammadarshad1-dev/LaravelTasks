@extends('layouts.main')

@section('content')
    <!--page-wrapper-->
    <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="card">

                    <div class="card-body">
                        <h4>{{ $title ?? 'Add Blog' }}</h4>
                        <form class="row g-3 blogadd" id="blogadd" method="post" action="{{ route('admin.addblog') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form group">
                                <input type="hidden" name="blogId" value="{{ $blogs->hashid ?? '' }}">
                            </div>




                            <div class="col-md-12">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                                    value="{{ $blogs->title ?? '' }}" required>
                            </div>





                            <div class="col-sm-12">
                                <label for="categorys">Categorys</label>
                              <select class="form-control" id="categorys" name="categorys" required>

                                @if (!isset($blogs->blog_categorys))
                                <option value="">Select a Category</option>
                                @endif

                                    @foreach ($category as $categorys)
                                        <option value="{{ $categorys->id }}"
                                            {{ isset($blogs->blog_categorys) && $blogs->blog_categorys->id == $categorys->id ? 'selected' : '' }}>
                                            {{ $categorys->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>




                            <div class="col-md-12">
                                <label class="form-label">Description</label>
                                <textarea type="text" id="description" name="description" value="{{ $blogs->description ?? '' }}" >{{ $blogs->description ?? '' }}</textarea>
                            </div>


                            <div class="col-sm-12">
                                <label for="tags">Tags</label>
                                <select class="tags form-control" id="tags" name="tags[]" multiple="multiple"
                                    required>

                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->name }}"
                                            @if (isset($blogs->blog_tags)) @foreach ($blogs->blog_tags as $blog_tags)
                                        {{ $blog_tags->tag->name == $tag->name ? 'Selected' : '' }}
                                        @endforeach @endif>
                                            {{ $tag->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>



                                <div class="col-md-12">
                                <label for="inputEmail" class="form-label">Profile</label>


                                @if(empty($blogs->blog_images))
                                <input type="file" class="form-control" name="profile_image[]" id="profile_image"
                                multiple="multiple" required>
                                @else

                                @if (isset($blogs->blog_images[0]))
                                <input type="file" class="form-control" name="profile_image[]" id="profile_image"
                                multiple="multiple" value="">

                                @else
                                <input type="file" class="form-control" name="profile_image[]" id="profile_image"
                                multiple="multiple" required>
                                @endif
                                @endif






                            </div>


                            @if (isset($blogs->blog_images))
                                <div class="col-sm-12 edit-images">
                                    @foreach ($blogs->blog_images as $blog_images)
                                        <div class="img-wrap">
                                            <a href="javascript:void(0);"
                                                data-url="{{ route('admin.delete_single_blog_img', $blogs->hashid) }}"
                                                onclick="ajaxRequest(this)"><i class="btn btn-danger lni lni-trash"
                                                    id="close"></i></a>

                                            <img src=" {{ check_file($blog_images->image_name) }}" id="blog-img"
                                                alt="blog-images">
                                        </div>
                                    @endforeach

                                </div>
                            @endif


                            <div class="col-12">
                                <button type="submit" class="btn btn-info">{{ $button ?? 'Add Blog' }}</button>
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
        <script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js'
            referrerpolicy="origin">
            < script >
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
            $('.blogadd').submit(function(e) {
                e.preventDefault();
                tinymce.triggerSave();
                $('#addblog').prop('disabled', true);
                var url = $(this).attr('action');
                var formData = new FormData(this);
                my_ajax(url, formData, 'post', function(res) {}, true);
                $('#addblog').prop('disabled', false);
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
        </script>




        // <script>
        //     $('#categorys').select2({
        //         theme: 'bootstrap4',
        //         width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        //         placeholder: $(this).data('placeholder'),
        //         allowClear: Boolean($(this).data('allow-clear')),
        //     });
        // </script>




        <script>
            tinymce.init({
                selector: "#description",
                menubar: true,
                toolbar: true,
                inline: false,
            });
        </script>
    @endsection
