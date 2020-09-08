<?php

namespace App\Http\Controllers\application\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Helper;
use App\Model\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class WebController extends Controller
{
    public function weblogin() {
//         if(Auth::guard('web')->check()){
//            return redirect('/Home');
//        }
      return view('Web-view.web_login');
    }
    public function logout(){
         Auth::guard('web')->logout();
        return redirect('/');
    }
    public function profile(){
        
    }

    public function postLogin(Request $request){
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
            if (Auth::guard('web')->attempt($credentials)) {
                return redirect('/Home');
            } else {
                return redirect()->back()->with('flash_message', trans('messages.10'));             
            }
        }    
         return redirect()->back()->with('flash_message', trans('messages.10'));    
    }
    public function registration(Request $request , $id = null){
         if ($request->isMethod('post')) {
            // dd($request->all());
             $User = new User();
             $validator = Validator::make($request->all(), [
                        'name' => 'required',                       
                        "email" => 'required|email',                       
                        "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                        "confirm_password" => 'required', 
                        'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            //$image_name = "";
            // dd($request->all());
            if ($request->hasFile('image')) {
                $image_temp = $request->file('image');
                if ($image_temp->isValid()) {
                    /* get  Image Extension */
                    $extension = $image_temp->getClientOriginalExtension();
                    /* get  New image name */
                    $image_name = rand(111, 999999) . '.' . $extension;
                    $destinationPath = public_path() . trans('labels.104');
                    $imagePath = $destinationPath . $image_name;
                    /* Upload the Image */
                    Image::make($image_temp)->resize(300, 400)->save($imagePath);
                    $User->image = $image_name;                    
                   
                }
                $data = $request->all();
            $User->name = $data['name'];
            $User->email = $data['email'];    
            $User->password = Hash::make($data['password']);    
            $User->status = 1;
            $result = $User->save();       
            
            if ($result == true) {
                return redirect('/')->with('success_message', trans('messages.22'));
            } else {
                return redirect()->back()->with('success', trans('messages.23'));
            }
         } 
         
                    }
         return view('Web-view.registration');
    }
    
                   
    public function index(){
         return view('Web-view.index');
        //return Auth::guard('web')->user();
    }
    public function home(){
         return view('Web-view.index');
        //return Auth::guard('web')->user();
    }
}
