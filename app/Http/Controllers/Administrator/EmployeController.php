<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Employe;
use App\Models\Skill;
use App\Models\Department;
use Yajra\DataTables\Facades\Datatables;

class EmployeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function employe()
    {
        $departments = Department::all();
        $staticskills=array('PHP','Ajax','Jquerry','Laravel','HTML','CSS','Bootstrap','Node');

        $data = array(
            'title' => 'Employe',
            'departments' => $departments,
            'staticskills' => $staticskills
        );

        return view('admin.employe', $data);
    }




    public function addemploye(Request $request)
    {

        $rules = [
            'fullname' => 'required|string',
            'email' => ($request->editid ? 'required|email|unique:employes,email,' . $request->editid : 'required|email|unique:employes,email'),
            'number' => 'required|numeric',
            'department' => 'required',
            'skills' => 'required|array',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $employe = new Employe;

        if (!empty($request->editid)) {
            $employe = $employe->find($request->editid);
            $msg = [
                'success' => 'Employe Successfully Updated',
                'redirect' => route('admin.allempoye')
            ];
        } else {
            $msg = [
                'success' => 'Employe Successfully Added',
                'redirect' => route('admin.allempoye')
            ];
        }

         $employe->dept_id = $request->department;
         $employe->name = $request->fullname;
         $employe->email = $request->email;
         $employe->phone = $request->number;
         $employe->save();

        // Delete existing skills
        Skill::where('emp_id', $employe->id)->delete();

        // Insert new skills
        $skillsToStore = [];
        foreach ($request->skills as $skill) {
            $skillsToStore[] = ['emp_id' => $employe->id, 'skill' => $skill, 'status' => '1'];
        }

        Skill::insert($skillsToStore);

        return response()->json($msg);
    }





    public function allempoye(Request $request)
    {
        if ($request->ajax()) {
              $employe = Employe::with('department', 'skill')->latest()->get();

            return DataTables::of($employe)
                ->addColumn('department_name', function($row) {
                    return $row->department->department_name;
                })
                ->addColumn('skills', function($row) {
                    return $row->skill->pluck('skill')->implode(', ');
                })
                ->addColumn('action', function($row) {
                    $editBtn = '<a href="' . route('admin.editemploye', $row->hashid) . '" class="btn btn-primary">Edit</a>';
                    $deleteBtn = '<a href="javascript:void(0);" data-url="' . route('admin.delete', $row->hashid) . '" onclick="ajaxRequest(this)" class="btn btn-danger">Delete</a>';

                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);

        }

        $data = array(
            'title' => 'Employe',
        );



        return view('admin.allempoye', $data);
    }



    public function delete($deid)
    {
        $employe = Employe::with('skill')->findorfail(hashids_decode($deid));
        $employe->skill()->delete();

        if ($employe->delete()) {
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




        public function editemploye($empid)
        {
            $departments = Department::all();
            $staticskills=array('PHP','Ajax','Jquerry','Laravel','HTML','CSS','Bootstrap','Node');
            $edits = Employe::with('department', 'skill')->where('id', hashids_decode($empid))->first();

            $data = array(
            'title' => 'Edit Employe',
            'departments' => $departments,
            'staticskills' => $staticskills,
            'edits' => $edits,
            'button' => 'Update'
            );

            return view('admin.employe',$data);
        }

}
