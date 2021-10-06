<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;
class StudentYearController extends Controller
{
    public function viewStudentYear()
    {
    	$data['arrView']=StudentYear::all();
    	return view('backend.setup.Student_year.view_year',$data);
    }
    public function addStudentYear()
    {
    	return view('backend.setup.Student_year.add_year');
    }
     public function storeStudentYear(Request $request)
    {
    	$validatedData=$request->validate([
    		'name'=>'required|unique:student_years,name,'
    	]);

    	$data=new StudentYear();
    	$data->name=$request->name;
    	$data->save();

    	 $notification=array(
         	'message'=>"Student Year inserted successfully !!!",
         	'alert-type'=>'success'
         );
    	return redirect()->route('student.year.view')->with($notification);
    }
     public function editStudentYear($id)
    {
    	$editData=StudentYear::find($id);
    	return view('backend.setup.Student_year.edit_year',compact('editData'));
    }
     public function updateStudentYear(Request $request,$id)
    {
    	$data=StudentYear::find($id);
    	$validatedData=$request->validate([
    		'name'=>'required|unique:student_years,name,'.$data->id
    	]); 

    	
    	$data->name=$request->name;
    	$data->save();

    	$notification=array(
         	'message'=>"Student Year Updated successfully !!!",
         	'alert-type'=>'success'
         );
    	return redirect()->route('student.year.view')->with($notification);
    }
    public function deleteStudentYear($id)
    {
    	StudentYear::find($id)->delete();
    	$notification=array(
         	'message'=>"Student Year Deleted successfully !!!",
         	'alert-type'=>'success'
         );
    	return redirect()->route('student.year.view')->with($notification);
    }
}
