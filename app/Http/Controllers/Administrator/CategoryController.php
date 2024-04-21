<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\Image;
use Yajra\DataTables\Facades\Datatables;

class CategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }




    public function category(Request $request)
    {
        $data = array(
            'title' => 'Category',
        );

        return view('admin.category',$data);
    }


    public function addcategory(Request $request)
    {
        $rules = [
            'category' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $ecid = $request->ecid;
        $category = new Category();
        if(!empty($ecid))
        {
          $category = $category->find($ecid);
          $msg = [
            'success' => 'Successfully Updated',
            'redirect' => route('admin.allcategory')
            ];
        }else{
            $msg = [
                'success' => 'Error!! Something is wrong',
                'redirect' => route('admin.allcategory')
          ];
        }

        $category->category_name = $request->category;
        $category->save();

        return response()->json($msg);
    }



    public function allcategory(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::all();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row) {
                $editBtn = '<a href="' . route('admin.edit_categoy', $row->id) . '" class="btn btn-primary">Edit</a>';
                $deleteBtn = '<a href="javascript:void(0);" data-url="' . route('admin.delete_category', $row->id) . '" onclick="ajaxRequest(this)" class="btn btn-danger">Delete</a>';

                return $editBtn . ' ' . $deleteBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }


         $data = array(
            'title' => 'All Catagories',
            // 'category' => $category,
          );


          return view('admin.allcategory',$data);
    }







    public function delete_category($cid)
    {
        $delete = Category::find($cid);
        if ($delete->delete()) {
            $msg = [
                'success' => 'Successfully Deleted',
                'reload' => true
            ];
        }else{
            $msg = [
                'success' => 'Error!! Delete faild try agian',
                'reload' => true
            ];
        }
        return response()->json($msg);
    }




    public function edit_categoy($cid)
    {
        $edit = Category::find($cid)->first();

        $data = array(
            'title' => 'Edit Catagory',
            'edit' => $edit,
            'button' => 'Update'
          );

        return view('admin.category',$data);
    }



    // public function filter_category(Request $request)
    // {
    //    $categorys = $request->categorys;

    //    $fliter_categories = Blog::with('blog_tags.tag','blog_images','blog_categorys')->where('cate_id',$categorys)->get();
    //    $allcategories = Category::all();

    //    $data = array(
    //     'title' => 'All Catagory',
    //     'fliter_categories' => $fliter_categories,
    //     'allcategories' => $allcategories
    //    );

    //    return view ('admin.allblog',$data);
    // }


}
