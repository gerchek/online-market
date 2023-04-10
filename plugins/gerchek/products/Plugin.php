<?php namespace Gerchek\Products;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            \Gerchek\Products\Components\ProductCreate::class => 'productCreate',
            \Gerchek\Products\Components\ProductUpdate::class => 'ProductUpdate',
            \Gerchek\Products\Components\Products::class => 'Products',
            \Gerchek\Products\Components\ProductDetail::class => 'ProductDetail',
            \Gerchek\Products\Components\Orders::class => 'Orders',
            \Gerchek\Products\Components\OrderDetail::class => 'OrderDetail'
        ];
    }

    public function registerSettings()
    {
    }
}
