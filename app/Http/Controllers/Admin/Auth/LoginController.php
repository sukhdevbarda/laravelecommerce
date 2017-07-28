<?php

namespace App\Http\Controllers\Admin\Auth;
use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index(){
    	return view('admin.Auth.login');
    }

    public function logOut(){
    	Auth::logout();
    	return redirect('admin/login');
    }

    public function postLogin(Request $request){

    	$data=$request->all();
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ]);

         if ($validator->fails()) {
            return redirect('admin/login')
                ->withErrors($validator)
                ->withInput();
        }
         
            if (Auth::attempt(['email' => $data['email'], 
            	'password' => $data['password']])) {
			   // Authentication passed...
			   return redirect()->intended('admin/dashboard');
			}
            $request->session()->flash('errorlogin', 'Credentials are Invalid!');
			return redirect('admin/login');
		

    }
}
