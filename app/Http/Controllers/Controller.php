<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $fillField=[];
    protected $requestObj='';

    public function healthy(Request $request,User $user){
        $count =$user->newQuery()->count();
        $user->save([]);
        return "good:".$count;
    }

    public function __construct(Request $requestUtil)
    {
        if(class_exists($this->requestObj)){
            $this->requestObj=new $this->requestObj();
            foreach ($this->fillField as $field){
                if($value=$requestUtil->input($field)) {
                    $this->requestObj->$field=$value;
                };
            }
        }
    }
}
