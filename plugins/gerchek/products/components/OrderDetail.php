<?php 
namespace Gerchek\Products\Components;

use Input;
use Flash;
use Gerchek\Products\Models\Orders;
use Gerchek\Products\Models\Products as Product;
use October\Rain\Exception\ValidationException;
class OrderDetail extends \Cms\Classes\ComponentBase
{
    public $order;

    public function componentDetails()
    {
        return [
            'name' => 'OrderDetail',
            'description' => 'OrderDetail'
        ];
    }

    /**
     * posts becomes available on the page as {{ component.posts }}
     */

     public function onRun()
    {
        $order_id = $this->param('order_id');
        $data = Orders::find($order_id);

        dd($data->products);

        $this->order = $data;
    }

}

// Order::whereHas('farmer', function ($query) use ($user) {
//     $query->where('id', $user->id);
// })