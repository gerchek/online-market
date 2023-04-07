<?php namespace Gerchek\Products\Models;

use Model;

/**
 * Model
 */
class Orders extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    protected $jsonable = ['products_data'];

    // protected $fillable = ['farmer_id'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'gerchek_products_orders';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'farmer' => 'RainLab\User\Models\User',
        'user' => 'Gerchek\Products\Models\Users',
        'address' => 'Gerchek\Products\Models\Addresses',
        'products' =>    [
            'Gerchek\Products\Models\Products',
            'table' => 'gerchek_products_orders_products'
        ] 
    ];

}
