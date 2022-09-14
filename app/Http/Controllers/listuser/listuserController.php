<?php

namespace App\Http\Controllers\listuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\user;
use App\Models\Models\listModel;
//use Illuminate\Support\Facades\Gate;

//use Dotenv\Validator;

class listuserController extends Controller
{
 /*   public function boot()
{
    $this->registerPolicies();

    Gate::define('list', function (User $user, listModel $post) {
        return $user->id === $post->user_id;
    });
}*/

    public function list() {
        return response()->json(listModel::get(), 200);
    }
    public function listGenerate(Request $req)
    {
       $list = listModel::create($req->all());   
       $fio = listModel::orderBy('id','desc')->value('fio');
       $idlast = listModel::orderBy('id','desc')->value('id');
     
      $idmatch = listModel::where('fio', '=', $fio)->value('id');
     
       if ( $idlast != $idmatch) {
        listModel::where('id', $idlast)->delete(); 
        return response()->json(['error'=> true, 'message'=> 'fio occupied']);
       }
     
       return response()->json($list, 201);
             
    }
       public function delall(Request $req)
       {
           listModel::where('id', '>', 0)->truncate();
       }

}
