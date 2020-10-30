<?php

namespace App\Http\Controllers\application\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Model\Library;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use App\Model\librarie;

class LibraryController extends Controller
{
    public function allLibrary() {
        Session::put('page', 'library');
        $libraries = librarie::get();    
        return view('Admin-view.Library.libraries')->with(compact('libraries'));
    }
    public function updateLibraryStatus(Request $request) {
        if ($request->ajax()) {
            $data = $request->all();
            librarie::where('id', $data['library_id'])->update(['status' => $data['status']]);
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
    public function deleteLibrary($id){            
            $val = explode("||", base64_decode($id));
            $library_id = $val[0]; 
            librarie::where('id',$library_id)->delete();
            return redirect()->back()->with('success_message', trans('messages.8'));          
        }
    public function deleteLibraryfile($id) {
        $val = explode("||", base64_decode($id));
        $library_id = $val[0];  
        $file = $val[1];
        $Librarydata = librarie::where('id', $library_id)->first();
        //dd($categorydata);
        if($file == 'library_image' ){
        $path = public_path() . trans('labels.100') . $Librarydata->library_image;
        if (file_exists($path) && !empty($Librarydata->library_image)) {
            unlink($path);
        }
        librarie::where('id', $library_id)->update(['library_image' => ""]);
        }elseif($file == 'library_video') {
            $path = public_path() . trans('labels.100') . $Librarydata->library_video;
        if (file_exists($path) && !empty($Librarydata->library_video)) {
            unlink($path);
        }
        librarie::where('id', $library_id)->update(['library_image' => ""]);
        } 
        return redirect()->back()->with('success_message', trans('messages.18'));
    }
    public function addEditLibrary(Request $request, $id = null) {
        if ($id == "") {
            $title = "Add Library";
            $Library = new librarie();
            $Librarydata = array();          
            $this->message = trans('messages.5');
        } else {
            $title = "Edit Package";
            $val = explode("||", base64_decode($id));
            $Library_id = $val[0];
            $Librarydata =  librarie::where('id',$Library_id)->first();          
            $Library = librarie::findOrFail($Library_id);
            $this->message = trans('messages.16');
        }
       // print_r(Library->id);dd();
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                        'name' => 'required',                       
                        "description" => 'required',       
                        'duration' => 'required',                       
                        "library_code" => 'required',      
                       // 'library_video' => 'required',                       
                        "price" => 'required', 
                        'library_video' => 'mimetypes:video/mp4|max:20000',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            if ($request->hasFile('library_video')) {
                $image_temp = $request->file('library_video');
                if ($image_temp->isValid()) {
                    /* get  Image Extension */
                    $extension = $image_temp->getClientOriginalExtension();
                    /* get  New image name */
                    $library_video = rand(111, 999999) . '.' . $extension;
                    $destinationPath = public_path() . trans('labels.106');
                    //$imagePath = $destinationPath . $library_video;
                    /* Upload the Image */
                     $image_temp->move($destinationPath,$library_video);
                    //Image::make($image_temp)->resize(300, 400)->save($imagePath);
                     $Library->library_image = $library_video;
            }            
            }
             if ($request->hasFile('library_image')) {
                $image_temp = $request->file('library_image');
                if ($image_temp->isValid()) {
                    /* get  Image Extension */
                    $extension = $image_temp->getClientOriginalExtension();
                    /* get  New image name */
                    $library_image = rand(111, 999999) . '.' . $extension;
                    $destinationPath = public_path() . trans('labels.106');
                    $imagePath = $destinationPath . $library_image;
                    /* Upload the Image */
                  //   $image_temp->move($imagePath);
                    Image::make($image_temp)->resize(300, 400)->save($imagePath);
                     $Library->library_image = $library_image;
            }            
            }
            $data = $request->all();
            $Library->name = $data['name'];
            $Library->description = (!empty($data['description'])) ? $data['description'] :"";
            $Library->price = (!empty($data['price'])) ? $data['price'] : 0;
            $Library->library_code = (!empty($data['library_code'])) ? $data['library_code'] : "";
            $Library->duration = (!empty($data['duration'])) ? $data['duration'] : 0;
            $Library->library_video = isset($library_video) ? $library_video : "";
            $Library->library_image = isset($library_image) ? $library_image : "";
            $Library->status = 1;
            $result = $Library->save();
            if ($result == true) {
                return redirect('admin/library')->with('success_message', $this->message);
            } else {
                return redirect()->back()->with('success', trans('messages.6'));
            }
        }     
        return view('Admin-view.Library.add_edit_Library')->with(compact('title', 'Librarydata'));
    }
        
}
