<?php namespace Gerchek\Profile;

use System\Classes\PluginBase;
use Rainlab\User\Controllers\Users as UsersControllers;
class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot(){
        UsersControllers::extendFormFields(function($form,$model,$context){
            $form->addTabFields([
                'wallet' => [
                    'label' => 'кошелек',
                    'type' => 'number',
                    'tab' => 'Profile'
                ],
                'best_farmer' => [
                    'label' => 'лучший фермер',
                    'type' => 'switch',
                    'tab' => 'Profile'
                ]
                ]);
        });
    }
}
