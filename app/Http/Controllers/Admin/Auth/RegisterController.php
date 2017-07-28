<?php

namespace App\Http\Controllers\Admin\Auth;
use App\User;
use Validator;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    
    public function index(){
    	return view('admin.Auth.register');
    }

    public function postRegister(Request $request){

    	$data=$request->all();
    	 $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
          ]);
        if ($validator->fails()) {
            return redirect('admin/register')
                ->withErrors($validator)
                ->withInput();
        }

            $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],          
            'password' => bcrypt($data['password'])
        ]);
            if($user){
            if (Auth::attempt(['email' => $data['email'], 
            	'password' => $data['password']])) {
			   // Authentication passed...
			   return redirect()->intended('admin/dashboard');
			}
		}
		 return redirect('admin/register');


    }
}
