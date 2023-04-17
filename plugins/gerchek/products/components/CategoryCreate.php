<?php 
namespace Gerchek\Products\Components;

use Input;
use Flash;
use Gerchek\Products\Models\Category;
// use Gerchek\Products\Models\Products;
use October\Rain\Exception\ValidationException;
class CategoryCreate extends \Cms\Classes\ComponentBase
{
    // public $userId;

    public function componentDetails()
    {
        return [
            'name' => 'CategoryCreate',
            'description' => 'CategoryCreate'
        ];
    }

    /**
     * posts becomes available on the page as {{ component.posts }}
     */


    public function onCategorySave()
   {
   
    $Category = new Category();
    
    $data = post();

    $rules = [
        'name' => 'required',
    ];

    $validation = \Validator::make($data, $rules);

    if ($validation->fails()) {
        throw new ValidationException($validation);
    }
    else
    {
        $user = \Auth::getUser();
        $name = $Category->name =Input::get('name');
        $farmer_id = $Category->farmer_id =$user->id ; 

        $Category->save();

        return \Redirect::to('/');
    }
 }
}