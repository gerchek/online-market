<?php 
namespace Gerchek\Products\Components;

use Input;
use Flash;
use Gerchek\Products\Models\Category;
use Gerchek\Products\Models\Orders as Order;
use RainLab\User\Models\User;
use October\Rain\Exception\ValidationException;
class Orders extends \Cms\Classes\ComponentBase
{
    public $userId;

    public function componentDetails()
    {
        return [
            'name' => 'Orders',
            'description' => 'Orders'
        ];
    }

    /**
     * posts becomes available on the page as {{ component.posts }}
     */

     public function onRun()
    {
        $user = \Auth::getUser();
        $this->userId = $user->id;

        // $data = Order::where('farmer_id', $user->id)->get();

        // dd($data[0]->user->phone);
        $this->page['orders'] = Order::where('farmer_id', $user->id)->get();
    }

    // public function onDelete()
    // {
    //     // dd("hi");
    //     $productId = post('id');
    //     $product = Product::findOrFail($productId);
    //     $product->delete();

    //     Flash::success('Product deleted successfully!');
    //     // return [
    //     //     '#product-list' => $this->renderPartial('@list')
    //     // ];
    //     return redirect()->back();
    // }

}