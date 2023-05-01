<?php 
namespace Gerchek\Products\Components;

use Input;
use Flash;
use Storage;    
use Gerchek\Products\Models\Category;
use Gerchek\Products\Models\Products;
use October\Rain\Exception\ValidationException;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
class ProductUpdate extends \Cms\Classes\ComponentBase
{
    public $userId;
    public $product;

    public function componentDetails()
    {
        return [
            'name' => 'ProductUpdate',
            'description' => 'ProductUpdate'
        ];
    }

    /**
     * posts becomes available on the page as {{ component.posts }}
     */

     public function onRun()
    {
        $productId = $this->param('product_id');

        $productmodel = Products::find($productId);
        $this->product = $productmodel; 
        // dd($productmodel->images);
        $user = \Auth::getUser();
        $this->userId = $user->id;
        $this->page['data'] = Category::where('farmer_id',$this->userId)->get();
    }

    public function onUpdate()
   {
    $productId = $this->param('product_id');
    
    if (isset($_POST['on_discount'])) {
        $_POST['on_discount'] = 1;
    } else {
        $_POST['on_discount'] = 0;
    }

    if (isset($_POST['fresh'])) {
        $_POST['fresh'] = 1;
    } else {
        $_POST['fresh'] = 0;
    }

    $Products = Products::find($productId);
    
    $data = post();

    $rules = [
        'name' => 'required',
        'description' => 'required',
        'compound' => 'required',
        'manufacture' => 'required',
        'category_id' => 'required',
        'price' => 'required',
        'discount' => 'required',
        // 'on_discount' => 'required',
        // 'fresh' => 'required',
        'user_id' => 'required',
        'storage_conditions' => 'required',
        'best_before_date' => 'required',
        'package' => 'required',
    ];

    $validation = \Validator::make($data, $rules);

    if ($validation->fails()) {
        throw new ValidationException($validation);
    }
    else
    {
        $Products->name =Input::get('name');
        $Products->description =Input::get('description');
        $Products->compound =Input::get('compound');
        $Products->manufacture =Input::get('manufacture');
        $Products->category_id =Input::get('category_id');
        $Products->price =Input::get('price');
        $Products->discount =Input::get('discount');
        $Products->on_discount =$_POST['on_discount'];
        $Products->fresh =$_POST['fresh'];
        foreach ($Products->images as $image) {
            $image->delete($image);
        } 
        $Products->images =Input::file('images');
        $Products->farmer_id =Input::get('user_id'); 

        $Products->storage_conditions =Input::get('storage_conditions'); 
        $Products->best_before_date =Input::get('best_before_date'); 
        $Products->package =Input::get('package'); 

        $Products->save();
        return \Redirect::to('/');
    }
 }
}