<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentFeeCategory;
class StudentFeeCategoryController extends Controller
{
    public function viewStudentFee()
    {
    	$data['arrView']=StudentFeeCategory::all();
    	return view('backend.setup.Student_fee.view_fee',$data);
    }
    public function addStudentFee()
    {
    	return view('backend.setup.Student_fee.add_fee');
    }
     public function storeStudentFee(Request $request)
    {
    	$validatedData=$request->validate([
    		'name'=>'required|unique:student_fee_categories,name,'
    	]);

    	$data=new StudentFeeCategory();
    	$data->name=$request->name;
    	$data->save();

    	 $notification=array(
         	'message'=>"Student Fee Category inserted successfully !!!",
         	'alert-type'=>'success'
         );
    	return redirect()->route('student.fee.view')->with($notification);
    }
     public function editStudentFee($id)
    {
    	$editData=StudentFeeCategory::find($id);
    	return view('backend.setup.Student_fee.edit_fee',compact('editData'));
    }
     public function updateStudentFee(Request $request,$id)
    {
    	$data=StudentFeeCategory::find($id);
    	$validatedData=$request->validate([
    		'name'=>'required|unique:student_fee_categories,name,'.$data->id
    	]); 

    	
    	$data->name=$request->name;
    	$data->save();

    	$notification=array(
         	'message'=>"Student Fee Category Updated successfully !!!",
         	'alert-type'=>'success'
         );
    	return redirect()->route('student.fee.view')->with($notification);
    }
    public function deleteStudentFee($id)
    {
    	StudentFeeCategory::find($id)->delete();
    	$notification=array(
         	'message'=>"Student Fee Category Deleted successfully !!!",
         	'alert-type'=>'success'
         );
    	return redirect()->route('student.fee.view')->with($notification);
    }
}
