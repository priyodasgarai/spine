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
}
