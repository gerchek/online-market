<?php 
namespace Gerchek\Products\Components;

use Input;
use Flash;
use Gerchek\Products\Models\Category;
use Gerchek\Products\Models\Products as Product;
use October\Rain\Exception\ValidationException;
class Categories extends \Cms\Classes\ComponentBase
{
    public $userId;

    public function componentDetails()
    {
        return [
            'name' => 'Categories',
            'description' => 'Categories'
        ];
    }

    /**
     * posts becomes available on the page as {{ component.posts }}
     */

     public function onRun()
    {
        $user = \Auth::getUser();
        $this->userId = $user->id;
        // dd(Product::where('farmer_id', '=', $this->userId)->get());

        $this->page['categories'] = Category::where('farmer_id', '=', $this->userId)->get();
    }

    public function onDelete()
    {
        // dd("hi");
        $productId = post('id');
        $product = Category::findOrFail($productId);
        $product->delete();

        Flash::success('Product deleted successfully!');
        // return [
        //     '#product-list' => $this->renderPartial('@list')
        // ];
        return redirect()->back();
    }

}