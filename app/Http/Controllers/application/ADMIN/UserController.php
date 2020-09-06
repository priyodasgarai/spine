<?php

namespace App\Http\Controllers\application\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function allUser() {
        Session::put('page', 'user');
        $users = User::get();    
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
    
     public function deleteUser($id){
        $val = explode("||", base64_decode($id));
            $user_id = $val[0];  
            $data = User::where('id',$user_id)->first();
            $path = public_path() . trans('labels.104') . $data->image;
            if(file_exists($path) && !empty($data->image)){
                unlink($path);
            }
            User::where('id',$user_id)->delete();
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
            $userdata =  User::where('id',$user_id)->first();          
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
                    if(isset($User->id)){
                        $enc_id = base64_encode($User->id.'||'.env('APP_KEY'));
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
           // $User->password = '$2y$10$L7xEFZzwRDJyirtwnkScy.JTySjt5Pis1OZ1keCqjBXtKQ0aeSl16';    
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
     public function deleteUserImage($id){
        $val = explode("||", base64_decode($id));
            $user_id = $val[0];
            $userdata =  User::where('id',$user_id)->first();
            $path = public_path() . trans('labels.104') . $userdata->image;
            if(file_exists($path) && !empty($userdata->image)){
                unlink($path);
            }
            User::where('id',$user_id)->update(['image'=>""]);
            return redirect()->back()->with('success_message', trans('messages.20'));
            
    }

}
