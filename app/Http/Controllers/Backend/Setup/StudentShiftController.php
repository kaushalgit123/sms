<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;
class StudentShiftController extends Controller
{
       public function viewStudentShift()
    {
    	$data['arrView']=StudentShift::all();
    	return view('backend.setup.Student_shift.view_shift',$data);
    }
    public function addStudentShift()
    {
    	return view('backend.setup.Student_shift.add_shift');
    }
     public function storeStudentShift(Request $request)
    {
    	$validatedData=$request->validate([
    		'name'=>'required|unique:student_shifts,name,'
    	]);

    	$data=new StudentShift();
    	$data->name=$request->name;
    	$data->save();

    	 $notification=array(
         	'message'=>"Student Shift inserted successfully !!!",
         	'alert-type'=>'success'
         );
    	return redirect()->route('student.shift.view')->with($notification);
    }
     public function editStudentShift($id)
    {
    	$editData=StudentShift::find($id);
    	return view('backend.setup.Student_shift.edit_shift',compact('editData'));
    }
     public function updateStudentShift(Request $request,$id)
    {
    	$data=StudentShift::find($id);
    	$validatedData=$request->validate([
    		'name'=>'required|unique:student_shifts,name,'.$data->id
    	]); 

    	
    	$data->name=$request->name;
    	$data->save();

    	$notification=array(
         	'message'=>"Student Shift Updated successfully !!!",
         	'alert-type'=>'success'
         );
    	return redirect()->route('student.shift.view')->with($notification);
    }
    public function deleteStudentShift($id)
    {
    	StudentShift::find($id)->delete();
    	$notification=array(
         	'message'=>"Student Shift Deleted successfully !!!",
         	'alert-type'=>'success'
         );
    	return redirect()->route('student.shift.view')->with($notification);
    }
}
