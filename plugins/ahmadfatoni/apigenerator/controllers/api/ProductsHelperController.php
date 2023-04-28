<?php namespace AhmadFatoni\ApiGenerator\Controllers\API;

use Cms\Classes\Controller;
use BackendMenu;

use Illuminate\Http\Request;
use AhmadFatoni\ApiGenerator\Helpers\Helpers; 
use Illuminate\Support\Facades\Validator;
use Gerchek\Products\Models\Products;
use Input;

class ProductsHelperController extends Controller
{
	protected $Products;

    protected $helpers;

    public function __construct(Products $Products, Helpers $helpers)
    {
        parent::__construct();
        $this->Products    = $Products;
        $this->helpers          = $helpers;
    }

    public function listProducts(){
        // dd("hi");
        $input = request()->input('identifiers');
        $identifiers = json_decode($input);
        // $identifiers = [7, 6];
        // dd($identifiers);

    // $items = Item::whereIn('id', $ids)->get();
        
        $data = $this->Products->whereIn('id', $identifiers)->with(['images'])->get()->toArray();
        return $this->helpers->apiArrayResponseBuilder(200, 'success', $data);
    }



    public static function getAfterFilters() {return [];}
    public static function getBeforeFilters() {return [];}
    public static function getMiddleware() {return [];}
    public function callAction($method, $parameters=false) {
        return call_user_func_array(array($this, $method), $parameters);
    }
    
}