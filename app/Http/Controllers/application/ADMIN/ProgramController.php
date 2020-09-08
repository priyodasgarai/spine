<?php

namespace App\Http\Controllers\application\ADMIN;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Program;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    public function allProgram() {
        Session::put('page', 'program');
        $programs = Program::get();    
        return view('Admin-view.Programs.programs')->with(compact('programs'));
    }
    public function updateProgramStatus(Request $request) {
        if ($request->ajax()) {
            $data = $request->all();
            Program::where('id', $data['program_id'])->update(['status' => $data['status']]);
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
    public function deleteProgram($id){            
            $val = explode("||", base64_decode($id));
            $Program_id = $val[0]; 
            Program::where('id',$Program_id)->delete();
            return redirect()->back()->with('success_message', trans('messages.8'));
           
    }
     public function addEditProgram(Request $request, $id = null) {
        if ($id == "") {
            $title = "Add Program";
            $Program = new Program();
            $Programdata = array();          
            $this->message = trans('messages.5');
        } else {
            $title = "Edit Package";
            $val = explode("||", base64_decode($id));
            $Program_id = $val[0];
            $Programdata =  Program::where('id',$Program_id)->first();          
            $Program = Program::findOrFail($Program_id);
            $this->message = trans('messages.16');
        }
       // print_r(Program->id);dd();
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                        'name' => 'required',                       
                        "description" => 'required',       
                       
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }
            
            $data = $request->all();
            $Program->name = $data['name'];
            $Program->description = $data['description'];    
           
            $Program->status = 1;
            $result = $Program->save();
            if ($result == true) {
                return redirect('admin/program')->with('success_message', $this->message);
            } else {
                return redirect()->back()->with('success', trans('messages.6'));
            }
        }     
        return view('Admin-view.Programs.add_edit_programs')->with(compact('title', 'Programdata'));
    }
}
