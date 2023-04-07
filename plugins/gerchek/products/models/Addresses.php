<?php namespace Gerchek\Products\Models;

use Model;

/**
 * Model
 */
class Addresses extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'gerchek_products_addresses';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'user' => 'Gerchek\Products\Models\Users'
    ];

    public $hasMany = [
        'orders' => 'Gerchek\Products\Models\Orders'
    ];
}
