<?php

namespace App\Http\Controllers\application\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Helpers\Helper;
use App\Model\User;

class WebController extends Controller
{
    public function weblogin(Request $request) {
//            $string = "hjgfd jhsd jkhds";
//            $result = Helper::shout($string);
          //  dd($result);       
        
         if ($request->isMethod('post')) {
            $rules = [
                'email' => 'required|email|max:150',
                'password' => 'required',
            ];
            $customMessages = [
                'email.required' => 'Email address is required',
                'email.email' => 'Valid email address is required',
                'password.required' => 'Password is required',
            ];
            $this->validate($request, $rules, $customMessages);
            $credentials = array('email' => $request['email'], 'password' => $request['password']);
            //dd($credentials);
            if (Auth::guard('web')->attempt($credentials)) {
                return redirect('admin/Home');
            } else {
                return redirect()->back()->with('flash_message', trans('messages.10'));             
            }
        }
        //return "hi000000000000000000";
         return view('Web-view.web_login');
    }
    public function home(){
        return "hi";
    }
}
