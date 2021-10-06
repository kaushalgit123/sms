<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userView()
    {
    	$data['view']=User::orderBy('id','DESC')->get();
    	return view('backend.user.view_user',$data);
    }
    public function userAdd()
    {

    	return view('backend.user.add_user');
    }
    public function userStore(Request $req)
    {
    	$validatedData=$req->validate([
    		'email'=>'required|unique:users',
    		'name'=>'required'
    	]);
    	$data=new User();
    	$data->usertype=$req->usertype;
    	$data->name=$req->name;
    	$data->email=$req->email;
    	$data->password=bcrypt($req->password);
    	$data->save();
         $notification=array(
         	'message'=>"User inserted successfully !!!",
         	'alert-type'=>'success'
         );
    	return redirect()->route('user.view')->with($notification);
    }
    public function userEdit($id)
    {
    	$editData=User::find($id);
    	return view('backend.user.edit_user',compact('editData'));
    }
    public function userUpdate(Request $req,$id)
    {
    	$data=User::find($id);
    	$data->usertype=$req->usertype;
    	$data->name=$req->name;
    	$data->email=$req->email;
    	$data->save();
         $notification=array(
         	'message'=>"User updated successfully !!!",
         	'alert-type'=>'info'
         );
    	return redirect()->route('user.view')->with($notification);
    }
    public function userDelete($id)
    {
    	User::find($id)->delete();
    	$notification=array(
         	'message'=>"User deleted successfully !!!",
         	'alert-type'=>'danger'
         );
    	return redirect()->route('user.view')->with($notification);
    }
}
