<?php

namespace App\Http\Controllers\Administrator;
// use Illuminate\Contracts\Encryption\DecryptException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Tag;
use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\Image;
use App\Models\Category;
// use Illuminate\Support\Facades\Crypt;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function blog()
    {
        $tags=Tag::all();
        $category = Category::all();
        $data = array(
            'title' => 'Add Blog',
            'tags' => $tags,
            'category' => $category
        );

        return view('admin.blog',$data);
    }




    // This is Add and Update blog function
    public function addblog(Request $request)
    {
        $blogId = $request->blogId;

        $rules = [
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required|array',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }


        $title=$request->title;
        $description=$request->description;
        $tags=$request->tags;
        $profile_image=$request->file('profile_image');
        $categorys = $request->categorys;

        $blog = new blog();
        if (!empty($request->blogId)) {

            $blog=$blog->find(hashids_decode($blogId));

            $msg = [
                'success' => 'Successfully Updated',
                'redirect' => route('admin.allblog')
            ];
        }else{
            $msg = [
                'success' => 'Successfully Added',
                'redirect' => route('admin.allblog')
            ];
        }

        $blog->cate_id = $categorys;
        $blog->title=$request->title;
        $blog->description=$request->description;
        $blog->save();

        $blog_images=[];
        if ($request->hasFile('profile_image')) {
            foreach ($request->profile_image as $img) {
                $blog_images[] = [
                    'blog_id' => $blog->id,
                    'image_name' => uploadSingleFile($img, 'uploads/blog/','png,jpeg,jpg'
                )];
            }
        }

        if (!empty($blog_images)) {
            $image=Image::insert($blog_images);
        }


        foreach ($tags as  $tag) {
          $blog_tags=Tag::firstOrCreate(['name' => $tag]);
        }

        $tag = Tag::whereIn('name', $request->tags)->pluck('id');

        $blog->tags()->sync($tag);

        return response()->json($msg);
    }



    // This is all blog function
    public function allblog(Request $request)
    {
        $search = $request->search;
        $categorys = $request->categorys;
        $tags = $request->tags;

        $blogs = Blog::query()->with('blog_tags.tag','blog_categorys');


        if (!empty($search)) {
            $blogs = $blogs->where('title','LIKE','%'.$request->search.'%')
            ->orwhere('description','LIKE','%'.$request->search.'%');
        }


        if (!empty($tags)) {
             $blogs = $blogs->whereHas('blog_tags', function ($query) use ($request) {
                    $query->whereIn('tag_id',$request->tags);});
        }


        if (!empty($categorys)) {
            $blogs = $blogs->where('cate_id',hashids_decode($categorys));
        }

        $allcategories = Category::all();

        $tags = Tag::all();

        $data = array(
            'title' => 'All Blogs',
            'allcategories' => $allcategories,
            'tags' => $tags,
            'blogs' => $blogs->latest()->get()
        );

        return view('admin.allblog',$data);
    }






    // This is edit form function
    public function editblog($bid)
    {
        $blogs =Blog::with('blog_tags.tag','blog_images','blog_categorys')->find(hashids_decode($bid));


        $tags=Tag::all();

        $category = Category::all();

        $data = array(
            'title' => 'Edit Blog',
            'blogs' => $blogs,
            'tags' => $tags,
            'category' => $category,
            'button' => 'Update'
        );

        return view('admin.blog',$data);
    }




    // Delete single image form edit form
    public function delete_single_blog_img($did)
    {
        $delete=Image::where('blog_id',hashids_decode($did))->first();
        if ($delete->delete()) {
            $msg = [
                'success' => 'Successfully Deleted',
                'reload' => true
            ];
        }else{
            $msg = [
                'success' => 'Error!! Deleted Failed',
                'reload' => true
            ];
        }
        return response()->json($msg);
    }






    // Delete blog with all data
    public function delete_blog($dbid)
    {
        $blog =Blog::with('blog_tags.tag','blog_images')->find(hashids_decode($dbid));

        if (!empty($blog->blog_images)) {
              foreach ($blog->blog_images as  $img) {
                  @unlink($img->image_name);
              }
         }

        $blog->delete();
        $blog->blog_tags()->delete();
        $blog->blog_images()->delete();

        $msg = [
            'success' => 'Successfully Deleted',
            'reload' => true
        ];
        return response()->json($msg);
    }






    // this is view blog function
    public function view_blog($vbid)
    {
        $blog =Blog::with('blog_tags.tag','blog_images','blog_categorys')->find(hashids_decode($vbid));

        $data = array(
            'title' => 'View Blog',
            'blog' => $blog
        );
        return view('admin.view_blog',$data);
    }





}
