<?php 
namespace Gerchek\Products\Components;

use Input;
use Flash;
use Gerchek\Products\Models\Category;
use Gerchek\Products\Models\Products;
use October\Rain\Exception\ValidationException;
class ProductCreate extends \Cms\Classes\ComponentBase
{
    public $userId;

    public function componentDetails()
    {
        return [
            'name' => 'ProductCreate',
            'description' => 'ProductCreate'
        ];
    }

    /**
     * posts becomes available on the page as {{ component.posts }}
     */

     public function onRun()
    {
        $user = \Auth::getUser();
        $this->userId = $user->id;
        $this->page['data'] = Category::where('farmer_id',$this->userId)->get();
    }

    public function onSend()
   {
   
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

    $Products = new Products();
    
    $data = post();

    $rules = [
        'name' => 'required',
        'description' => 'required',
         'compound' => 'required',
         'manufacture' => 'required',
         'category_id' => 'required',
         'price' => 'required',
         'discount' => 'required',
        //  'on_discount' => 'required',
        //  'fresh' => 'required',
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
        $name = $Products->name =Input::get('name');
         $description = $Products->description =Input::get('description');
         $compound = $Products->compound =Input::get('compound');
         $manufacture = $Products->manufacture =Input::get('manufacture');
         $category_id = $Products->category_id =Input::get('category_id');
         $price = $Products->price =Input::get('price');
         $discount = $Products->discount =Input::get('discount');
         $on_discount = $Products->on_discount =$_POST['on_discount'];
         $fresh = $Products->fresh =$_POST['fresh'];
         $images = $Products->images =Input::file('images');
        $farmer_id = $Products->farmer_id =Input::get('user_id'); 
        $storage_conditions = $Products->storage_conditions =Input::get('storage_conditions'); 
        $best_before_date = $Products->best_before_date =Input::get('best_before_date'); 
        $package = $Products->package =Input::get('package'); 

        $Products->save();

        return \Redirect::to('/');
    }
 }
}