<?php
namespace App\Http\Controllers;
use Validator;
use App\UserLog;

use Laravel\Lumen\Routing\Controller as BaseController;
class LogController extends BaseController 
{

    public function index()
    {
        $categories = UserLog::with(['user' => function($q){
            return $q->select('id','email');
        }])->paginate(20);
        return response()->json($categories);
    }
    
}
    