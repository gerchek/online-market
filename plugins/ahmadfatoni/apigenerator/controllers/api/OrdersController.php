<?php namespace AhmadFatoni\ApiGenerator\Controllers\API;

use Cms\Classes\Controller;
use BackendMenu;

use Illuminate\Http\Request;
use AhmadFatoni\ApiGenerator\Helpers\Helpers;
use Illuminate\Support\Facades\Validator;
use Gerchek\Products\Models\Orders;
class OrdersController extends Controller
{
	protected $Orders;

    protected $helpers;

    public function __construct(Orders $Orders, Helpers $helpers)
    {
        parent::__construct();
        $this->Orders    = $Orders;
        $this->helpers          = $helpers;
    }

    public function index(){

        // 
        // $user_id = \Request::get('user_id');
        // dd($user_id);
        // ---------------------------------------------------------------
        $user_id = \Request::get('user_id');
        if ($user_id) {
            // dd($farmerid);
            $data = $this->Orders->where('user_id',$user_id)->get()->toArray();
            return $this->helpers->apiArrayResponseBuilder(200, 'success', $data);
        }else{
            $data = $this->Orders->get()->toArray();
            return $this->helpers->apiArrayResponseBuilder(200, 'success', $data);
        }

        // $data = $this->Orders->all()->toArray();

        // return $this->helpers->apiArrayResponseBuilder(200, 'success', $data);
    }

    public function show($id){

        $data = $this->Orders::find($id);

        if ($data){
            return $this->helpers->apiArrayResponseBuilder(200, 'success', [$data]);
        } else {
            $this->helpers->apiArrayResponseBuilder(404, 'not found', ['error' => 'Resource id=' . $id . ' could not be found']);
        }

    }

    public function store(Request $request){

    	$arr = $request->all();

        while ( $data = current($arr)) {
            $this->Orders->{key($arr)} = $data;
            next($arr);
        }

        $validation = Validator::make($request->all(), $this->Orders->rules);
        
        if( $validation->passes() ){
            $this->Orders->save();
            return $this->helpers->apiArrayResponseBuilder(201, 'created', ['id' => $this->Orders->id]);
        }else{
            return $this->helpers->apiArrayResponseBuilder(400, 'fail', $validation->errors() );
        }

    }

    public function update($id, Request $request){

        $status = $this->Orders->where('id',$id)->update($data);
    
        if( $status ){
            
            return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been updated successfully.');

        }else{

            return $this->helpers->apiArrayResponseBuilder(400, 'bad request', 'Error, data failed to update.');

        }
    }

    public function delete($id){

        $this->Orders->where('id',$id)->delete();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been deleted successfully.');
    }

    public function destroy($id){

        $this->Orders->where('id',$id)->delete();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been deleted successfully.');
    }


    public static function getAfterFilters() {return [];}
    public static function getBeforeFilters() {return [];}
    public static function getMiddleware() {return [];}
    public function callAction($method, $parameters=false) {
        return call_user_func_array(array($this, $method), $parameters);
    }
    
}