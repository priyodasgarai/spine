<?php

namespace App\Http\Controllers\application\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Helper;
use App\Model\User;
use App\Model\user_document;
use App\Model\user_address;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\application\ADMIN\UserController;
use App\Model\Userassignment;

class WebController extends Controller {

    public function weblogin() {
        if (Auth::guard('web')->check()) {
            return redirect('/Home');
        }
        //   return view('Web-view.web_login');
        return view('Web-view.web_login');
    }

    public function logout() {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    public function user_details() {
        $UserController = new UserController();
        if (!empty(Auth::guard('web')->user())) {
            $id = base64_encode(Auth::guard('web')->user()->id . '||' . env('APP_KEY'));
        } else {
            $id = NULL;
        }
        $result = $UserController->getDetails($id);
        $user_details = $result['user_details'];
        //dd($user_details->user_address);
        $librarys = $result['librarys'];
        return view('Web-view.user_details')->with(compact('user_details', 'librarys'));
    }

    public function update_details() {
        $userDetails = Auth::guard('web')->user();
        return view('Web-view.profile', ['userDetails' => $userDetails]);
    }

    public function delete_file($id) {
        $val = explode("||", base64_decode($id));
        $user_id = $val[0];
        //dd($user_id);
        $data = user_document::where('id', $user_id)->first();
        $path = public_path() . trans('labels.104') . $data->file_name;
        // dd($path);
        if (file_exists($path) && !empty($data->file_name)) {
            unlink($path);
        }
        user_document::where('id', $user_id)->delete();
        return redirect()->back()->with('success_message', trans('messages.8'));
    }

    public function postLogin(Request $request) {
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

    public function registration(Request $request, $id = null) {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if ($id == "") {
                $User = new User();
                $validator = Validator::make($request->all(), [
                            'name' => 'required',
                            "email" => 'required|email',
                            "confirm_password" => 'required',
                            'password' => 'required|min:6|required_with:confirm_password|same:confirm_password',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator);
                }
                $User->email = $data['email'];
                $User->password = Hash::make($data['password']);
                $User->name = $data['name'];
                $User->status = 1;
                $result = $User->save();

                if ($result == true) {
                    return redirect('/')->with('success_message', trans('messages.22'));
                } else {
                    return redirect()->back()->with('Error', trans('messages.23'));
                }
            } else {
                $User = User::findOrFail(Auth::guard('web')->user()->id);

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
                }
                $User->address = (isset($data['address'])) ? $data['address'] : $User->address;
                $User->name = (isset($data['name'])) ? $data['name'] : $User->name;
                $User->date_of_birth = (isset($data['date_of_birth'])) ? $data['date_of_birth'] : $User->date_of_birth;
                $User->city = (isset($data['city'])) ? $data['city'] : $User->city;
                $User->contact_number_1 = (isset($data['contact_number_1'])) ? $data['contact_number_1'] : $User->contact_number_1;
                $User->contact_number_2 = (isset($data['contact_number_2'])) ? $data['contact_number_2'] : $User->contact_number_2;
                $User->gender = (isset($data['gender'])) ? $data['gender'] : $User->gender;
                $User->UT = (isset($data['UT'])) ? $data['UT'] : $User->UT;
                //dd($User);
                $result = $User->save();

                if ($result == true) {
                    return redirect('/Home')->with('success_message', trans('messages.22'));
                } else {
                    return redirect()->back()->with('Error', trans('messages.23'));
                }
            }
        }
        return view('Web-view.web_register');
    }

//    public function index(){
//        
//         return view('Web-view.dashboard');
//        //return Auth::guard('web')->user();
//    }
    public function home() {
        // dd('home');
        return view('Web-view.dashboard');
        //return Auth::guard('web')->user();
    }

    public function document_uplodas(Request $request) {
        if ($request->isMethod('post')) {
            $user_document = new user_document();
            $data = $request->all();
            if ($data['file_type'] == 1) {
                $validator = Validator::make($request->all(), [
                            'file_type' => 'required',
                            'video' => 'required|mimetypes:video/mp4|max:20000'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator);
                }
                if ($request->hasFile('video')) {
                    $image_temp = $request->file('video');
                    if ($image_temp->isValid()) {
                        /* get  Image Extension */
                        $extension = $image_temp->getClientOriginalExtension();
                        /* get  New image name */
                        $user_video = rand(111, 999999) . '.' . $extension;
                        $destinationPath = public_path() . trans('labels.104');
                        //$imagePath = $destinationPath . $library_video;
                        /* Upload the Image */
                        $image_temp->move($destinationPath, $user_video);
                        //Image::make($image_temp)->resize(300, 400)->save($imagePath);
                        $user_document->file_name = $user_video;
                    }
                }
                $user_document->file_type = $data['file_type'];
            } elseif ($data['file_type'] == 2) {
                $validator = Validator::make($request->all(), [
                            'file_type' => 'required',
                            'file_name' => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator);
                }

                if ($request->hasFile('file_name')) {
                    $image_temp = $request->file('file_name');
                    if ($image_temp->isValid()) {
                        /* get  Image Extension */
                        $extension = $image_temp->getClientOriginalExtension();
                        /* get  New image name */
                        $document = rand(111, 999999) . '.' . $extension;
                        $destinationPath = public_path() . trans('labels.104');
                        $imagePath = $destinationPath . $document;
                        /* Upload the Image */
                        $image_temp->move($destinationPath, $document);
                        //  Image::make($image_temp)->resize(300, 400)->save($imagePath);
                        $user_document->file_name = $document;
                    }
                }
                $user_document->file_type = $data['file_type'];
            } else {
                return redirect()->back();
            }
            $user_document->user_id = Auth::guard('web')->user()->id;
            $user_document->status = 1;
            $result = $user_document->save();

            if ($result == true) {
                return redirect()->back()->with('success_message', trans('messages.5'));
            } else {
                return redirect()->back()->with('Error', trans('messages.6'));
            }
        } else {
            return redirect()->back();
        }
    }

    public function training_libray() {
        $UserController = new UserController();
        if (!empty(Auth::guard('web')->user())) {
            $id = base64_encode(Auth::guard('web')->user()->id . '||' . env('APP_KEY'));
        } else {
            $id = NULL;
        }
        $result = $UserController->getDetails($id);       
        return view('Web-view.training_libray')->with(compact('result'));
    }
      public function updateTrainingLibrayStatus(Request $request) {
        if ($request->ajax()) {
            $data = $request->all();
           // dd($data);
            Userassignment::where('id', $data['librarie_id'])->update(['status' => 2,'score'=>10]);
            $this->result = true;
            $this->message = trans('messages.2');
        } else {
            $this->result = FALSE;
            $this->message = trans('messages.3');
        }
        return Response::make([
                    'result' => $this->result,
                    'message' => $this->message
        ]);
    }

    /*     * ****************************************** */

    public function add_address() {
        return view('Web-view.add_address');
    }

    public function post_add_address(Request $request) {
        $data = $request->all();
         if ($data['address_type'] > 0) {
            
        } else {
            return redirect()->back()->withInput()->with('error_message', 'Please select address type');
        }
        $user_id = Auth::guard('web')->user()->id;
        $condition1 = array('user_id' => $user_id, 'address_type' => 1);
        $condition2 = array('user_id' => $user_id, 'address_type' => 2);
        $Shipping = user_address::where($condition1)->get();
        $Billing =  user_address::where($condition2)->get();              
        if ($Shipping->count() > 0 && $Billing->count() > 0) {
            return redirect('user-details')->withInput()->with('error_message', 'You are already added Shipping and Billing address');
        }elseif($Shipping->count() > 0 && $data['address_type'] == 1){
            return redirect('user-details')->withInput()->with('error_message', 'You are already added Shipping address,Please select Billing address');
        }elseif($Billing->count() > 0 && $data['address_type'] == 2){
            return redirect('user-details')->withInput()->with('error_message', 'You are already added Billing address,Please select Shipping address');
        }
        $validator = Validator::make($request->all(), [
                    'address_type' => 'required',
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'address' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'zipcode' => 'required',
                    'phone_number' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $user_address = new user_address();
        $user_address->user_id = Auth::guard('web')->user()->id;
        $user_address->address_type = $data['address_type'];
        $user_address->first_name = $data['first_name'];
        $user_address->last_name = $data['last_name'];
        $user_address->address = $data['address'];
        $user_address->city = $data['city'];
        $user_address->state = $data['state'];
        $user_address->zipcode = $data['zipcode'];
        $user_address->phone_number = $data['phone_number'];
        $result = $user_address->save();
        if ($result == true) {
            return redirect()->back()->with('success_message', trans('messages.5'));
        } else {
            return redirect()->back()->with('Error', trans('messages.6'));
        }
    }
    
     public function delete_address($id) {
        $val = explode("||", base64_decode($id));
        $address_id = $val[0];        
        user_address::where('id', $address_id)->delete();
        return redirect()->back()->with('success_message', trans('messages.8'));
    }

}
