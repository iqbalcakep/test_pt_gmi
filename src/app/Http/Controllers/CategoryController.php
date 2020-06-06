<?php
namespace App\Http\Controllers;
use Validator;
use App\Category;

use Laravel\Lumen\Routing\Controller as BaseController;
class CategoryController extends BaseController 
{

    public function index()
    {
        $categories = Category::paginate('20');
        return response()->json($categories);
    }
    
}
    