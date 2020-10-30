<?php

namespace App\Http\Controllers\application\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\Model\Package;
use App\Model\Userpackage;
use Illuminate\Support\Facades\Hash;
use App\Model\librarie;
use App\Model\Userlibrary;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {

    public function __construct() {
       DB::connection()->enableQueryLog();
    }
    public function allUser($data = null) {
        Session::put('page', 'user');
        $condition = array(); 
        //dd($data);
        if(isset($data)){
            if($data == "Enrollments"){
                $condition = array('is_newenrollments' => 1);  
            }elseif($data == "Pending"){
                $condition = array('is_pending' => 0);  
            }elseif($data == "Inactive"){
                $condition = array('is_inactive' => 0);  
            }
            
        }
        $users = User::where($condition)->get();
       // $queries = DB::getQueryLog();
      //  dd($queries);
        return view('Admin-view.Users.users')->with(compact('users'));
    }

    public function updateUserStatus(Request $request) {
        if ($request->ajax()) {
            $data = $request->all();
            User::where('id', $data['user_id'])->update(['status' => $data['status']]);
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

    public function deleteUser($id) {
        $val = explode("||", base64_decode($id));
        $user_id = $val[0];
        $data = User::where('id', $user_id)->first();
        $path = public_path() . trans('labels.104') . $data->image;
        if (file_exists($path) && !empty($data->image)) {
            unlink($path);
        }
        User::where('id', $user_id)->delete();
        return redirect()->back()->with('success_message', trans('messages.8'));
    }

    public function addEditUser(Request $request, $id = null) {
        if ($id == "") {
            $title = "Add User";
            $User = new User();
            $userdata = array();
            $getUser = array();
            $this->message = trans('messages.5');
        } else {
            $title = "Edit User";
            $val = explode("||", base64_decode($id));
            $user_id = $val[0];
            $userdata = User::where('id', $user_id)->first();
            $User = User::findOrFail($user_id);
            $this->message = trans('messages.16');
        }
        // print_r($User->id);dd();
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        "email" => 'required|email',
                        "image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            //$image_name = "";
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
                    if (isset($User->id)) {
                        $enc_id = base64_encode($User->id . '||' . env('APP_KEY'));
                        $this->deleteUserImage($enc_id);
                    }
                }

//                elseif (!empty($data['category_image'])) {
//                    $image_name = $data['category_image'];
//                } else {
//                    $image_name = "";
//                }
            }
            $data = $request->all();
            $User->name = $data['name'];
            $User->email = $data['email'];
            $User->password = Hash::make(123456);
            ;
            $User->status = 1;
            $result = $User->save();
            if ($result == true) {
                return redirect('admin/users')->with('success_message', $this->message);
            } else {
                return redirect()->back()->with('success', trans('messages.6'));
            }
        }
        // $getSection = Section::get();
        return view('Admin-view.Users.add_edit_user')->with(compact('title', 'userdata'));
    }

    public function deleteUserImage($id) {
        $val = explode("||", base64_decode($id));
        $user_id = $val[0];
        $userdata = User::where('id', $user_id)->first();
        $path = public_path() . trans('labels.104') . $userdata->image;
        if (file_exists($path) && !empty($userdata->image)) {
            unlink($path);
        }
        User::where('id', $user_id)->update(['image' => ""]);
        return redirect()->back()->with('success_message', trans('messages.20'));
    }

    public function getDetails($id) {
        $val = explode("||", base64_decode($id));
        $user_id = $val[0];
        $user_details = User::with(['user_document', 'user_address', 'library'])->where('id', $user_id)->first();

        $id = array();
        if (!empty($user_details->library)) {
            foreach ($user_details->library as $data) {
                $id[] = $data->id;
            }
        }
        $librarys = librarie::whereNotIn('id', $id)->where('status', 1)->get();
        $data = array('user_details' => $user_details, 'librarys' => $librarys);
        return $data;
    }

    public function userDetails($id) {
        $result = $this->getDetails($id);
        $user_details = $result['user_details'];
        $librarys = $result['librarys'];
        return view('Admin-view.Users.user_details')->with(compact('user_details', 'librarys'));
    }

    public function userAssignLibrary($id) {
        $result = $this->getDetails($id);
        $user_details = $result['user_details'];
        $librarys = $result['librarys'];
        //  dd($user_details->library);
        return view('Admin-view.Users.assign_library')->with(compact('user_details', 'librarys'));
    }

    public function deleteUserLibrary($id) {
        $val = explode("||", base64_decode($id));
        $User_id = $val[2];
        $Library_id = $val[0];
        $condition = array('librarie_id' => $Library_id, 'user_id' => $User_id);
        //   dd($condition);
        Userlibrary::where($condition)->delete();
        return redirect()->back()->with('success_message', trans('messages.8'));
    }
    public function addUserLibrary(Request $request){
        if ($request->ajax()) {
            $data = $request->all();           
            if(is_array($data['librarie_id'])){               
                foreach($data['librarie_id'] as $librarie_id){
                    $Userlibrarie = new Userlibrary;
                    $Userlibrarie->user_id = $data['user_id'];
                    $Userlibrarie->librarie_id = $librarie_id;
                    $this->result = $Userlibrarie->save();
                } 
            }
            $this->result = true;
            $this->message = trans('messages.5');
        } else {
            $this->result = FALSE;
            $this->message = trans('messages.6');
        }
        return Response::make([
                    'result' => $this->result,
                    'message' => $this->message
        ]);
    }

    public function deleteUserPackage($id) {
        //   dd('df');
        $val = explode("||", base64_decode($id));
        $User_id = $val[2];
        $Package_id = $val[0];
        $condition = array('package_id' => $Package_id, 'user_id' => $User_id);
        //   dd($condition);
        Userpackage::where($condition)->delete();
        return redirect()->back()->with('success_message', trans('messages.8'));
    }

    public function addUserPackage(Request $request) {
        if ($request->ajax()) {
            $data = $request->all();
            // dd($data);
            // Package::where('id', $data['package_id'])->update(['status' => $data['status']]);
            if (is_array($data['package_id'])) {

                foreach ($data['package_id'] as $package_id) {
                    $Userpackage = new Userpackage;
                    $Userpackage->user_id = $data['user_id'];
                    $Userpackage->package_id = $package_id;
                    $this->result = $Userpackage->save();
                }
            }
            $this->result = true;
            $this->message = trans('messages.5');
        } else {
            $this->result = FALSE;
            $this->message = trans('messages.6');
        }
        return Response::make([
                    'result' => $this->result,
                    'message' => $this->message
        ]);
    }

}
