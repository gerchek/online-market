<?php 
namespace Gerchek\Products\Components;

use Input;
use Flash;
use Storage;    
use Gerchek\Products\Models\Category;
// use Gerchek\Products\Models\Products;
use October\Rain\Exception\ValidationException;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
class CategoryUpdate extends \Cms\Classes\ComponentBase
{
    // public $userId;
    public $category;

    public function componentDetails()
    {
        return [
            'name' => 'CategoryUpdate',
            'description' => 'CategoryUpdate'
        ];
    }

    /**
     * posts becomes available on the page as {{ component.posts }}
     */

     public function onRun()
    {
        $productId = $this->param('category_id');

        $category = Category::find($productId);
        $this->category = $category; 
    }

    public function onCategoryUpdate()
   {
    
    $data = post();

    $rules = [
        'name' => 'required',
    ];
    $Category = Category::find($data["id"]);

    $validation = \Validator::make($data, $rules);

    if ($validation->fails()) {
        throw new ValidationException($validation);
    }
    else
    {
        $user = \Auth::getUser();
        $Category->name =Input::get('name');
        $Category->farmer_id =$user->id; 
        $Category->save();
        return \Redirect::to('/');
    }
 }
}