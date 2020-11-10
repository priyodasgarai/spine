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
use App\Model\Virtualmeaning;
use Illuminate\Support\Facades\DB;

class VirtualmeaningController extends Controller
{
    public function allVirtualmeaning() {
        Session::put('page', 'virtual-meeting');
        $Virtualmeanings = Virtualmeaning::get();    
        return view('Admin-view.virtualmeeting.virtual_meeting')->with(compact('Virtualmeanings'));
    }
    public function updateVirtualmeaningStatus(Request $request) {
        if ($request->ajax()) {
            $data = $request->all();
            Virtualmeaning::where('id', $data['Virtualmeaning_id'])->update(['status' => $data['status']]);
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
     public function deleteVirtualmeaning($id){            
            $val = explode("||", base64_decode($id));
            $Package_id = $val[0]; 
            Virtualmeaning::where('id',$Package_id)->delete();
            return redirect()->back()->with('success_message', trans('messages.8'));           
    }
    public function addEditVirtualmeaning(Request $request, $id = null) {
        if ($id == "") {
           $Virtual = new Virtualmeaning();
            $Virtualdata = array();
            $title = "Add Virtual Meeting";
            $getVirtual = array();
            $this->message = trans('messages.5');
        } else {
            $title = "Edit Virtual Meeting";
            $val = explode("||", base64_decode($id));
            $Virtual_id = $val[0];
            $Virtualdata =  Virtualmeaning::where('id',$Virtual_id)->first();          
            $Virtual = Virtualmeaning::findOrFail($Virtual_id);
            $this->message = trans('messages.16');
        }
       // print_r($Package->id);dd();
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                        'vm_name' => 'required',                       
                        "description" => 'required'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
           
            $data = $request->all();
            $Virtual->vm_name = $data['vm_name'];
            $Virtual->description = $data['description'];   
            $Virtual->status = 1;
            $result = $Virtual->save();
            if ($result == true) {
                return redirect('admin/Virtual')->with('success_message', $this->message);
            } else {
                return redirect()->back()->with('success', trans('messages.6'));
            }
        }     
        return view('Admin-view.virtualmeeting.add_edit_virtual')->with(compact('title', 'Virtualdata'));
    }
}
