<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupController extends Controller
{
    public function viewStudentGroup()
    {
    	$data['arrView']=StudentGroup::all();
    	return view('backend.setup.Student_group.view_group',$data);
    }
    public function addStudentGroup()
    {
    	return view('backend.setup.Student_group.add_group');
    }
     public function storeStudentGroup(Request $request)
    {
    	$validatedData=$request->validate([
    		'name'=>'required|unique:student_groups,name,'
    	]);

    	$data=new StudentGroup();
    	$data->name=$request->name;
    	$data->save();

    	 $notification=array(
         	'message'=>"Student Group inserted successfully !!!",
         	'alert-type'=>'success'
         );
    	return redirect()->route('student.group.view')->with($notification);
    }
     public function editStudentGroup($id)
    {
    	$editData=StudentGroup::find($id);
    	return view('backend.setup.Student_group.edit_group',compact('editData'));
    }

    //Updated Student Group
      public function updateStudentGroup(Request $request,$id)
    {
    	$data=StudentGroup::find($id);
    	$validatedData=$request->validate([
    		'name'=>'required|unique:student_groups,name,'.$data->id
    	]); 

    	
    	$data->name=$request->name;
    	$data->save();

    	$notification=array(
         	'message'=>"Student Group Updated successfully !!!",
         	'alert-type'=>'success'
         );
    	return redirect()->route('student.group.view')->with($notification);
    }

    //Delete Student Group

     public function deleteStudentGroup($id)
    {
    	StudentGroup::find($id)->delete();
    	$notification=array(
         	'message'=>"Student Group Deleted successfully !!!",
         	'alert-type'=>'success'
         );
    	return redirect()->route('student.group.view')->with($notification);
    }
}
