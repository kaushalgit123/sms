<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class ManageProfileController extends Controller
{
    public function viewProfile()
    {
    	$id=Auth::user()->id;
    	$viewData=User::find($id);
    	return view('backend.profile.view_profile',compact('viewData'));
    }
    public function editProfile()
    {
    	$id=Auth::user()->id;
        $editData=User::find($id);
    	return view('backend.profile.edit_profile',compact('editData'));
    }
    public function storeProfile(Request $request)
    {
    	$data=User::find(Auth::user()->id);
    	$data->name=$request->name;
    	$data->email=$request->email;
    	$data->mobile=$request->mobile;
    	$data->gender=$request->gender;
    	$data->address=$request->address;
    	if($request->file('image'))
    	{
    		$file=$request->file('image');
    		@unlink(public_path('upload/user_images/'.$data->image));
    		$filename=date('Ymd')."_".$file->getClientOriginalName();
    		$file->move(public_path('upload/user_images/'),$filename);
    		$data['image']=$filename;
    	}
    	$data->save();
    	$notification=array(
         	'message'=>"User Profile Updated successfully !!!",
         	'alert-type'=>'success'
         );
    	return redirect()->route('view.profile')->with($notification);
    }

    public function editPassword()
    {
        return view('backend.profile.edit_password');
    }
    public function changePassword(Request $request)
    {
        $dataValidated=$request->validate([
            'oldpassword'=>'required',
            'password' => 'required | confirmed'
        ]);

        $hashpassword=Auth::user()->password;
        if(Hash::check($request->oldpassword,$hashpassword))
        {
             $data=User::find(Auth::id());
             $data->password=Hash::make($request->password);
             $data->save();
             Auth::logout();
             return redirect()->route('login');
        }
        else
        {
            //dd("nothelp");
            return redirect()->back();
        }
    }    
}
