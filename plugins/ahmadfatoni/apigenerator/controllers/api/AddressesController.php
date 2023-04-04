<?php namespace AhmadFatoni\ApiGenerator\Controllers\API;

use Cms\Classes\Controller;
use BackendMenu;

use Illuminate\Http\Request;
use AhmadFatoni\ApiGenerator\Helpers\Helpers;
use Illuminate\Support\Facades\Validator;
use Gerchek\Products\Models\Addresses;
class AddressesController extends Controller
{
	protected $Addresses;

    protected $helpers;

    public function __construct(Addresses $Addresses, Helpers $helpers)
    {
        parent::__construct();
        $this->Addresses    = $Addresses;
        $this->helpers          = $helpers;
    }

    public function index(){

        $data = $this->Addresses->all()->toArray();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', $data);
    }

    public function show($id){

        $data = $this->Addresses::find($id);

        if ($data){
            return $this->helpers->apiArrayResponseBuilder(200, 'success', [$data]);
        } else {
            $this->helpers->apiArrayResponseBuilder(404, 'not found', ['error' => 'Resource id=' . $id . ' could not be found']);
        }

    }

    public function store(Request $request){

    	$arr = $request->all();

        while ( $data = current($arr)) {
            $this->Addresses->{key($arr)} = $data;
            next($arr);
        }

        $validation = Validator::make($request->all(), $this->Addresses->rules);
        
        if( $validation->passes() ){
            $this->Addresses->save();
            return $this->helpers->apiArrayResponseBuilder(201, 'created', ['id' => $this->Addresses->id]);
        }else{
            return $this->helpers->apiArrayResponseBuilder(400, 'fail', $validation->errors() );
        }

    }

    public function update($id, Request $request){

        $status = $this->Addresses->where('id',$id)->update($data);
    
        if( $status ){
            
            return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been updated successfully.');

        }else{

            return $this->helpers->apiArrayResponseBuilder(400, 'bad request', 'Error, data failed to update.');

        }
    }

    public function delete($id){
        dd("delete");

        $this->Addresses->where('id',$id)->delete();

        return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been deleted successfully.');
    }

    public function destroy($id){
        $this->Addresses->where('id',$id)->delete();

        // return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been deleted successfully.');
        return ['status' => 'Data has been deleted successfully'];
    }


    public static function getAfterFilters() {return [];}
    public static function getBeforeFilters() {return [];}
    public static function getMiddleware() {return [];}
    public function callAction($method, $parameters=false) {
        return call_user_func_array(array($this, $method), $parameters);
    }
    
}