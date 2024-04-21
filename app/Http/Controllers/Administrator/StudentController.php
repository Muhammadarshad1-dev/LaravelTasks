<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use App\Models\Student;


class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function student()
    {
        $departments = Department::get();

        $data = array(
            'title' => 'Add Student',
            'departments' => $departments
        );

        return view('admin.Student', $data);
    }






    public function addstudents(Request $request)
    {
        $sid = $request->input('sid');

        $rules = [
            'name' => 'required|string',
            'email' => ($sid ? 'required|email|unique:students,email,' . $sid : 'required|email|unique:students,email'),
            'department' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $student = new Student;
        if($sid){
            $student = $student->find($sid);
            $msg = [
                'success' => 'Student Successfully updated',
                'redirect' => route('admin.allstudent')
            ];
        }else{
            $msg = [
                'success' => 'Student Successfully added',
                'redirect' => route('admin.allstudent')
            ];
        }

        $student->dept_id = $request->department;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->save();
        return response()->json($msg);
    }





    public function allstudent()
    {
        $student= Student::with('department')->latest()->get();

        $data = array(
            'title' => 'All Students',
            'student' => $student
        );

        return view('admin.allstudent', $data);
    }



     public function editstudents($seid)
     {
        $student = Student::find($seid);
        $departments = Department::all();

        $data = array(
            'title' => 'Edit Student',
            'student' => $student,
            'departments' => $departments,
            'button' => 'Update'
        );

        return view('admin.student',$data);
     }




     public function deletestudents($did)
     {
        $student = Student::findorfail($did);

        if ($student->delete()) {
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


}
