<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Model\Package;
use App\Model\user_address;
use App\Model\user_document;
use App\Model\librarie;
use App\Model\Virtualmeaning;
use App\Model\Uservirtualmeaning;
use App\Model\Userassignment;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens,Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function packages() {
        return $this->belongsToMany(Package::class, 'user_package');
    }
    
    public function user_document(){
        return $this->hasMany(user_document::class,'user_id','id');
    }
    
     public function user_address(){
        return $this->hasMany(user_address::class,'user_id','id');
    }
    public function user_metting() {
        return $this->hasMany(Uservirtualmeaning::class,'user_id','id');
    }    
    
    public function virtualMeeting() {
        return $this->belongsToMany(Virtualmeaning::class, 'user_virtualmeaning')->using(Uservirtualmeaning::class);
    }
    
    public function assignment($id,$assign_type=null){
        $userassignment = DB::table('userassignment as us');
        $userassignment->select('us.*','us.id as userassignment_id','us.status as userassignment_status', 'li.*','vm.vm_name'); 
        $userassignment->leftJoin('user_virtualmeaning as uv', 'uv.id', '=', 'us.user_virtual_id');
        $userassignment->leftJoin('virtualmeanings as vm', 'uv.virtualmeaning_id', '=', 'vm.id');
        $userassignment->leftJoin('libraries as li', 'li.id', '=', 'us.librarie_id');
        if(isset($assign_type)){
            $userassignment->where('us.assign_type',$assign_type);
        }
        // $userassignment->where('us.status', '=',1);
        $userassignment->whereIn('us.user_virtual_id',$id);
        $result = $userassignment->get();        
        return $result;
    }
//     public function vm_status($id){
//        $userassignment = DB::table('userassignment');
//        $userassignment->select('user_virtualmeaning_id', DB::raw('(CASE WHEN count(*) = "Null" THEN "0" ELSE "1" END) as tt'));                 
//        $userassignment->groupBy('user_virtualmeaning_id');
//        $userassignment->where('statuss', '=',0);      
//        $userassignment->whereIn('user_virtualmeaning_id',$id);
//        $result = $userassignment->get();        
//        return $result;
//    }
    
    
    
} 