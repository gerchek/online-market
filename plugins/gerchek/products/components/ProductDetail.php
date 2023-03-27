<?php 
namespace Gerchek\Products\Components;

use Input;
use Flash;
use Gerchek\Products\Models\Category;
use Gerchek\Products\Models\Products as Product;
use October\Rain\Exception\ValidationException;
class ProductDetail extends \Cms\Classes\ComponentBase
{
    public $product;

    public function componentDetails()
    {
        return [
            'name' => 'ProductDetail',
            'description' => 'ProductDetail'
        ];
    }

    /**
     * posts becomes available on the page as {{ component.posts }}
     */

     public function onRun()
    {
        $productId = $this->param('product_id');
        $this->product = Product::where('id', '=', $productId)->get();
    }

}