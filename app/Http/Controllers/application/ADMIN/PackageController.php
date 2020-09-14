<?php

namespace App\Http\Controllers\application\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Package;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\Model\Program;
use App\Model\Packageprogram;

class PackageController extends Controller
{
    public function allPackage() {
        Session::put('page', 'package');
        $Packages = Package::get();    
        return view('Admin-view.Packages.packages')->with(compact('Packages'));
    }
    public function updatePackageStatus(Request $request) {
        if ($request->ajax()) {
            $data = $request->all();
            Package::where('id', $data['package_id'])->update(['status' => $data['status']]);
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
    public function deletePackage($id){
            $this->deletePackageImage($id);
            $val = explode("||", base64_decode($id));
            $Package_id = $val[0]; 
            Package::where('id',$Package_id)->delete();
            return redirect()->back()->with('success_message', trans('messages.8'));
           
    }
     public function deletePackageImage($id){
        $val = explode("||", base64_decode($id));
            $Package_id = $val[0];
            $Packagedata =  Package::where('id',$Package_id)->first();
            $path = public_path() . trans('labels.102') . $Packagedata->package_image;
            if(file_exists($path) && !empty($Packagedata->package_image)){
                unlink($path);
            }
            Package::where('id',$Package_id)->update(['package_image'=>""]);
            return redirect()->back()->with('success_message', trans('messages.21'));
            
    }
     public function addEditPackage(Request $request, $id = null) {
        if ($id == "") {
            $title = "Add Package";
            $Package = new Package();
            $Packagedata = array();
            $getPackage = array();
            $this->message = trans('messages.5');
        } else {
            $title = "Edit Package";
            $val = explode("||", base64_decode($id));
            $Package_id = $val[0];
            $Packagedata =  Package::where('id',$Package_id)->first();          
            $Package = Package::findOrFail($Package_id);
            $this->message = trans('messages.16');
        }
       // print_r($Package->id);dd();
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                        'name' => 'required',                       
                        "description" => 'required',       
                        "amount" => 'required',
                        "package_image" => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            //$image_name = "";
            if ($request->hasFile('package_image')) {
                $image_temp = $request->file('package_image');
                if ($image_temp->isValid()) {
                    /* get  Image Extension */
                    $extension = $image_temp->getClientOriginalExtension();
                    /* get  New image name */
                    $image_name = rand(111, 999999) . '.' . $extension;
                    $destinationPath = public_path() . trans('labels.102');
                    $imagePath = $destinationPath . $image_name;
                    /* Upload the Image */
                    Image::make($image_temp)->resize(300, 400)->save($imagePath);
                    $Package->package_image = $image_name;                    
                    if(isset($Package->id)){
                        $enc_id = base64_encode($Package->id.'||'.env('APP_KEY'));
                        $this->deletePackageImage($enc_id);
                        }       
                } 
            }
            $data = $request->all();
            $Package->name = $data['name'];
            $Package->description = $data['description'];    
            $Package->amount = $data['amount'];    
            $Package->status = 1;
            $result = $Package->save();
            if ($result == true) {
                return redirect('admin/package')->with('success_message', $this->message);
            } else {
                return redirect()->back()->with('success', trans('messages.6'));
            }
        }     
        return view('Admin-view.Packages.add_edit_package')->with(compact('title', 'Packagedata'));
    }
    public function packageDetails($id){      
            $val = explode("||", base64_decode($id));
            $Package_id = $val[0]; 
            $package = Package::with(['programs'])->where('id',$Package_id)->first();  
           
            $id = array();
            if(!empty($package->programs)){
                 foreach($package->programs as $data){
                     $id[] =  $data->id;
                 }
            }  
            $programs = Program::whereNotIn('id',$id )->where('status',1)->get(); 
          //  dd($programs);
            return view('Admin-view.Packages.packagedetails')->with(compact('package', 'programs'));
    }
    public function deletePackageProgram($id){
     //   dd('df');
         $val = explode("||", base64_decode($id));
            $Package_id = $val[2]; 
             $Program_id = $val[0]; 
             $condition = array('package_id'=>$Package_id , 'program_id'=>$Program_id);
          //   dd($condition);
            Packageprogram::where($condition)->delete();
            return redirect()->back()->with('success_message', trans('messages.8'));
    }
    public function addPackageProgram(Request $request){
        if ($request->ajax()) {
            $data = $request->all();
           // dd($data);
           // Package::where('id', $data['package_id'])->update(['status' => $data['status']]);
            if(is_array($data['program_id'])){
               
                foreach($data['program_id'] as $program_id){
                    $Packageprogram = new Packageprogram;
                    $Packageprogram->package_id = $data['package_id'];
                    $Packageprogram->program_id = $program_id;
                    $result = $Packageprogram->save();
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
