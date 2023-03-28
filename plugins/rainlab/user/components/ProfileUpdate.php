<?php 
namespace RainLab\User\Components;

use Input;
use Flash;
// use Gerchek\Products\Models\Category;
// use Gerchek\Products\Models\Products as Product;
use October\Rain\Exception\ValidationException;
class ProfileUpdate extends \Cms\Classes\ComponentBase
{
    public $userData;

    public function componentDetails()
    {
        return [
            'name' => 'ProfileUpdate',
            'description' => 'ProfileUpdate'
        ];
    }

    /**
     * posts becomes available on the page as {{ component.posts }}
     */

    public function onRun()
    {
        $user = \Auth::getUser();
        // dd($user);
        $this->userData = $user;
        // dd($this->userData);
        // dd(Product::where('farmer_id', '=', $this->userId)->get());

        // $this->page['products'] = Product::where('farmer_id', '=', $this->userId)->get();
    }

    public function onProfileUpdate()
    {
        // $data = post();
        // dd($data);

        $user = \Auth::getUser();
        $data = post();

        // if ($data['password'] == $data['password_confirmation']) {
        //     dd("dogry");
        // }

        // if ($this->updateRequiresPassword()) {
        //     if (!$user->checkHashValue('password', $data['password_current'])) { 
        //         throw new ValidationException(['password_current' => Lang::get('rainlab.user::lang.account.invalid_current_pass')]);
        //     }
        // }

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . \Auth::getUser()->id,
            'password' => 'required|confirmed|min:6',
        ];
    
        $validation = \Validator::make($data, $rules);
    
        if ($validation->fails()) {
            Flash::error($validation->messages()->first());
            return;
        }


        if (Input::hasFile('avatar')) {
            $user->avatar = Input::file('avatar');
        }


        // $data['password'] = \Hash::make($data['password']);

        // Update the user data
        // $user->name = $data['name'];
        // $user->email = $data['email'];
        // $user->password = $data['password'];
        $user->fill($data);
        $user->save();

        // Redirect back to the current page
        return \Redirect::to('/register');
    }

    public function updateRequiresPassword()
    {
        return $this->property('requirePassword', false);
    }


}