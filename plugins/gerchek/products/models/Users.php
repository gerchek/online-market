<?php namespace Gerchek\Products\Models;

use Model;

/**
 * Model
 */
class Users extends Model
{
    use \October\Rain\Database\Traits\Validation;
    protected $fillable = ['phone'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'gerchek_products_users';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    // public $hasMany = [
    //     'addresses' => 'Gerchek\Products\Models\Addresses'
    // ];

    public $hasMany = [
        'addresses' => [
            'Gerchek\Products\Models\Addresses',
            'key' => 'user_id',
            'otherKey' => 'id'
            // 'fieldName' => 'myFieldName'
        ]
    ];
}
