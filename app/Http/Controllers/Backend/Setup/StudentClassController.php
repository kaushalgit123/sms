<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
class StudentClassController extends Controller
{
    public function viewStudentClass()
    {
    	$data['arrView']=StudentClass::all();
    	return view('backend.setup.Student_class.view_class',$data);
    }
    public function addStudentClass()
    {
    	return view('backend.setup.Student_class.add_class');
    }
    public function storeStudentClass(Request $request)
    {
    	$validatedData=$request->validate([
    		'name'=>'required|unique:student_classes,name,'
    	]);

    	$data=new StudentClass();
    	$data->name=$request->name;
    	$data->save();

    	 $notification=array(
         	'message'=>"Student Class inserted successfully !!!",
         	'alert-type'=>'success'
         );
    	return redirect()->route('student.class.view')->with($notification);
    }
    public function editStudentClass($id)
    {
    	$editData=StudentClass::find($id);
    	return view('backend.setup.Student_class.edit_class',compact('editData'));
    }
    public function updateStudentClass(Request $request,$id)
    {
    	$data=StudentClass::find($id);
    	$validatedData=$request->validate([
    		'name'=>'required|unique:student_classes,name,'.$data->id
    	]); 

    	
    	$data->name=$request->name;
    	$data->save();

    	$notification=array(
         	'message'=>"Student Class Updated successfully !!!",
         	'alert-type'=>'success'
         );
    	return redirect()->route('student.class.view')->with($notification);
    }
    public function deleteStudentClass($id)
    {
    	StudentClass::find($id)->delete();
    	$notification=array(
         	'message'=>"Student Class Deleted successfully !!!",
         	'alert-type'=>'success'
         );
    	return redirect()->route('student.class.view')->with($notification);
    }
}
