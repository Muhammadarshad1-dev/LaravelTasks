<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Member;
use App\Models\Memberskill;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function member()
    {
        $data = array(
            'title' => 'Add Member'
        );
        return view('admin.member',$data);
    }




    public function addmember(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'email' => ($request->ueid ? 'required|email|unique:members,email,' . $request->ueid : 'required|email|unique:members,email'),
            'skill' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

         $member = new Member;

           if (!empty($request->ueid))
        {
            $member = $member->find($request->ueid);
            $msg = [
                'success' => 'Employe Successfully Updated',
                'redirect' => route('admin.allmember')
            ];
        }else{
            $msg = [
                'success' => 'Employe Successfully Added',
                'redirect' => route('admin.allmember')
            ];
        }

        $member->name = $request->name;
        $member->email = $request->email;
        $member->save();

        Memberskill::where('memb_id', $member->id)->delete();


        $skillsToStore = [];
        foreach ($request->skill as $skills) {
            $skillsToStore[] = ['memb_id' => $member->id, 'skill' => $skills];
        }

        Memberskill::insert($skillsToStore);

        return response()->json($msg);
    }



    public function allmember()
    {
        $member=Member::with('memberskill')->get();

        $data = array(
            'title' => 'All Members',
            'member'=> $member
        );

        return view('admin.allmember',$data);
    }



    public function deletemember($dmid)
    {
        $member=Member::with('memberskill')->findorfail($dmid);
        $member->memberskill()->delete();
        if ($member->delete()) {
            $msg = [
                'success' => 'Deleted Successfully',
                'reload' => true
            ];
            }else{
                $msg = [
                    'error' => 'Error Something is wrong try again',
                    'reload' => true
                ];
             }
        return response()->json($msg);
    }





    public function editmember($meid)
    {
        $member=Member::with('memberskill')->find($meid);

        $data = array(
            'title' => 'Edit Members',
            'member' => $member,
            'button' => 'Update'
        );

        return view('admin.member',$data);
    }




}
