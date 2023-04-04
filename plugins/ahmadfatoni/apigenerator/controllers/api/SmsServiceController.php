<?php namespace AhmadFatoni\ApiGenerator\Controllers\API;

use Cms\Classes\Controller;
use BackendMenu;

use Illuminate\Http\Request;
use AhmadFatoni\ApiGenerator\Helpers\Helpers;
use Illuminate\Support\Facades\Validator;
use Gerchek\Products\Models\SmsVerify;
use GuzzleHttp\Client;
class SmsServiceController extends Controller
{
	protected $SmsVerify;

    protected $helpers;

    public function __construct(SmsVerify $SmsVerify, Helpers $helpers)
    {
        parent::__construct();
        $this->SmsVerify    = $SmsVerify;
        $this->helpers          = $helpers;
    }

    public function send(Request $request){

        // $data = $this->SmsVerify->all()->toArray();

        // return $this->helpers->apiArrayResponseBuilder(200, 'success', $data);
        // =============================================================================================
        try {
            $sub_minute=now()->subSeconds(15)->format('Y-m-d H:i:s');
            $check=SmsVerify::where(['phone' => $request->get('phone')])->where('created_at','>=',$sub_minute)->first();

            if($check){
                return ['status' => false]; 
            }else{
                (new Client())->post(
                "https://smspilot.ru/api.php",
                [
                'form_params' => [
                    'send' => 'Код подтверждения: ' . $code = rand(1111, 9999),
                    'format' => 'json',
                    'apikey' => config('services.smspilot.api_key'),
                    'to' => $request->get('phone')
                ],
                ]
            );

            SmsVerify::updateOrCreate(
                ['phone' => $request->get('phone')], 
                [
                    'phone' => $request->get('phone'), 
                    'code' => $code, 
                    'created_at' => now()->format('Y-m-d H:i:s'),
                    'updated_at' => now()->format('Y-m-d H:i:s')
                ]
            );
            return ['code' => $code]; 
            }
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }

    public function check(Request $request){

        // $data = $this->SmsVerify->all()->toArray();

        // return $this->helpers->apiArrayResponseBuilder(200, 'success', $data);
        // =============================================================================================
        try {
            //Проверяеть код
            if (!SmsVerify::where(['phone' => $request->get('phone'), 'code' => $request->get('code')])->first()) return ['status' => false];
            return ['status' => true, 'phone' => $request->get('phone')];
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }

    }

    // public function show($id){

    //     $data = $this->Products::find($id);

    //     if ($data){
    //         return $this->helpers->apiArrayResponseBuilder(200, 'success', [$data]);
    //     } else {
    //         $this->helpers->apiArrayResponseBuilder(404, 'not found', ['error' => 'Resource id=' . $id . ' could not be found']);
    //     }

    // }

    // public function store(Request $request){

    // 	$arr = $request->all();

    //     while ( $data = current($arr)) {
    //         $this->Products->{key($arr)} = $data;
    //         next($arr);
    //     }

    //     $validation = Validator::make($request->all(), $this->Products->rules);
        
    //     if( $validation->passes() ){
    //         $this->Products->save();
    //         return $this->helpers->apiArrayResponseBuilder(201, 'created', ['id' => $this->Products->id]);
    //     }else{
    //         return $this->helpers->apiArrayResponseBuilder(400, 'fail', $validation->errors() );
    //     }

    // }

    // public function update($id, Request $request){

    //     $status = $this->Products->where('id',$id)->update($data);
    
    //     if( $status ){
            
    //         return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been updated successfully.');

    //     }else{

    //         return $this->helpers->apiArrayResponseBuilder(400, 'bad request', 'Error, data failed to update.');

    //     }
    // }

    // public function delete($id){

    //     $this->Products->where('id',$id)->delete();

    //     return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been deleted successfully.');
    // }

    // public function destroy($id){

    //     $this->Products->where('id',$id)->delete();

    //     return $this->helpers->apiArrayResponseBuilder(200, 'success', 'Data has been deleted successfully.');
    // }


    public static function getAfterFilters() {return [];}
    public static function getBeforeFilters() {return [];}
    public static function getMiddleware() {return [];}
    public function callAction($method, $parameters=false) {
        return call_user_func_array(array($this, $method), $parameters);
    }
    
}