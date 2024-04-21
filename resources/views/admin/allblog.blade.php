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
                                <h4>Categories</h4>
                                <form action="{{ route('admin.allblog') }}" class="row g-3 filter_category"
                                    id="filter_category">

                                    <div class="col-sm-12">
                                    <input type="text" name="search" id="search" class="form-control" placeholder="Search">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="Catgories">Category</label>
                                        <select class="form-control" id="categorys" name="categorys" >
                                          <option value="">Select a Category</option>

                                            @foreach ($allcategories as $allcategorie)
                                                <option value="{{ $allcategorie->hashid}}"
        @if (request()->input('categorys') && $allcategorie->hashid == request()->input('categorys')))
                                                    selected
                                                @endif>
                                                    {{ $allcategorie->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-md-6">
                                        <label for="Tags">Tags</label>
                                        <select class="tags form-control" id="tags" name="tags[]" multiple="multiple">

                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}"
                @if (request()->input('tags') && in_array($tag->id,request()->input('tags')))
                                                    selected
                                                @endif>
                                                    {{ $tag->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="col-12">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                        <a class="btn btn-primary" href="{{ route('admin.allblog')}}">Reset</a>
                                    </div>
                                </form>
                            </div>
                        </div>






                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <a href="{{ route('admin.blog') }}" class="btn btn-success" style="float: right;">Add
                                        Blog</a>
                                    <h4 class="mb-0">All Blogs</h4>
                                </div>
                                <hr />
                                <div class="table-responsive">
                                    <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                        <div id="DeleteMsg"></div>
                                        <thead>
                                            <tr>
                                                <th>S#No</th>
                                                <td>imge</td>
                                                <th>title</th>
                                                <th>Category</th>
                                                <th>Tags</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($blogs as $k => $blog)
                                                <tr>
                                                    <td>{{ $k + 1 }}</td>

                                                    <td>
                                                        @if (!isset($blog->blog_images[0]))
                                                            Image not avaiable
                                                        @else
                                                            <img src=" {{ check_file($blog->blog_images[0]->image_name) }}"
                                                                class="user-img" alt="user avatar">
                                                        @endif
                                                    </td>

                                                    <td>
                                                        {{ $blog->title }}
                                                    </td>

                                                    <td>
                                                        {{ $blog->blog_categorys->category_name }}
                                                    </td>


                                                    <td>
                                                        @foreach ($blog->blog_tags as $blog_tags)
                                                            {{ $blog_tags->tag->name }}
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    </td>

                                                    <td>
                                                        <a href="javascript:void(0);" class="btn btn-danger"
                                                            data-url="{{ route('admin.delete_blog', $blog->hashid) }}"
                                                            onclick="ajaxRequest(this)">Delete</a>


                                                        <a href="{{ route('admin.editblog', $blog->hashid) }}"
                                                            class="btn btn-primary">Edit</a>

                                                        <a href="{{ route('admin.view_blog', $blog->hashid) }}"
                                                            class="btn btn-warning">View</a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
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


        {{-- <div class="col">
            <!-- Modal -->
            <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Title</th>
                                    <td id="blogtitle"></td>
                                </tr>

                                <tr>
                                    <th>Tags</th>
                                    <td>
                                        <select class="tags form-control" id="tags" multiple="multiple">
                                            <option selected="selected" disabled="disabled">orange</option>
                                            <option>white</option>
                                            <option selected="selected">purple</option>
                                        </select>
                                    </td>
                                </tr>


                                <tr>
                                    <th>Description</th>
                                    <td> is a long established fact that a reader will be distracted by the readable content
                                        of a page when looking at its layout. The point of using Lorem Ipsum is that it has
                                        a more-or-less normal distribution of letters, as opposed to using here, content
                                        her></td>
                                </tr>


                                <tr>
                                    <th>Images</th>
                                    <td>
                                        <div class="img-wrap">
                                            <img src=""
                                                id="blog-img" alt="blog-images">
                                        </div>
                                    </td>
                                </tr>


                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    @endsection















    @section('script')
        {{-- <script>
            $(document).ready(function(){
                $(document).on('click', '.view_blog', function() {
                let data = $(this).data('blog-id');
                var title = data.title;
                $('#blogtitle').text(title);


            });
        });
         </script> --}}

        <script>
            $('#tags').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
        </script>


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
    @endsection
