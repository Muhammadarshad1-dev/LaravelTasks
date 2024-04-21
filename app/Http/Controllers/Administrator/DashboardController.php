<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
        $data = array(
            'title' => 'Dashboard'
        );
        return view('admin.index',$data);
    }

    function profile(){
        $data = array(
            'title' => 'Profile',
            'edit' => auth('admin')->user()
        );
        return view('admin.profle')->with($data);
    }

    function update_profile(Request $request) {

        $rules = [
            'name' => 'required|string|max:15',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $user = Admin::find(auth('admin')->id());

        if ($request->hasFile('profile_image')) {
            $profile_image = uploadSingleFile($request->file('profile_image'), 'uploads/admins/profile/','png,jpeg,jpg');
            if (is_array($profile_image)) {
                return response()->json($profile_image);
            }
            if (file_exists($user->image)) {
                @unlink($user->image);
            }
            $user->image = $profile_image;
        }

        $user->name = $request->name;
        $user->save();

        $msg = [
            'success' => 'Profile Updated Successfully',
            'reload' => true
        ];

        return response()->json($msg);
    }

    public function change_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $msg = [
            'success' => __('Password Updated Successfully'),
            'reload' => true,
        ];

        $admin = Admin::find(auth('admin')->id());

        if (!(Hash::check($request->old_password, $admin->password))) {
            return response()->json([
                'error' => __('Please Enter Correct Current Password'),
            ]);
        }

        if (strcmp($request->old_password, $request->password) == 0) {
            return response()->json([
                'error' => __('msg.password_error_old_same'),
            ]);
        }

        $admin->password = Hash::make($request->password);
        $admin->save();

        return response()->json($msg);
    }
}
