<?php namespace AhmadFatoni\ApiGenerator\Controllers\API;

use Cms\Classes\Controller;
use BackendMenu;

use Illuminate\Http\Request;
use AhmadFatoni\ApiGenerator\Helpers\Helpers;
use Illuminate\Support\Facades\Validator;
// use Gerchek\Products\Models\SmsVerify;
use Gerchek\Products\Models\Orders;
use GuzzleHttp\Client;
class OrderServiceController extends Controller
{

    public function getData(Request $request)
    {
        // Get the JSON data from the request body
        $data = $request->json()->all();

        $orders = $data['orders']; // array

        $address_id = $data['address_id'];
        $someotherdata = $data['someotherdata'];
        $status = $data['status'];
        $user_id = $data['user_id'];


        $count = count($orders);

        for ($i = 0; $i < $count; $i++) {
            $order = new Orders;

            $order->status = $status;
            $order->user_id = $user_id;
            $order->address_id = $address_id;
            $order->someotherdata = $someotherdata;
            $order->farmer_id = $orders[$i]['farmer_id'];
            $order->price = $orders[$i]['price'];

            $order->save();

            $userData = [];

            foreach ($orders[$i]['products_data'] as $item) {
                $userData[$item['products']] = ['quantity' => $item['quantity']];
            }

            foreach ($userData as $product_id => $data) {
                $quantity = $data['quantity'];
                $currentDateTime = new \DateTime();
                $order->products()->attach($product_id, ['quantity' => $quantity, 'orders_id' => $order->id, 'created_at' => $currentDateTime->format('Y-m-d H:i:s'),'updated_at' => $currentDateTime->format('Y-m-d H:i:s')]);
              }
              
        }

        return response()->json(['message' => 'Data received successfully']);
    }


    public static function getAfterFilters() {return [];}
    public static function getBeforeFilters() {return [];}
    public static function getMiddleware() {return [];}
    public function callAction($method, $parameters=false) {
        return call_user_func_array(array($this, $method), $parameters);
    }
    
}