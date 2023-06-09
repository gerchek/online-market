<?php namespace Gerchek\Products\Models;

use Model;

/**
 * Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    protected $jsonable = ['images'];

    protected $fillable = ['user_id'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'gerchek_products_categories';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $hasMany = [
        'products' => 'Gerchek\Products\Models\Users'
    ];

    public $belongsTo = [
        'farmer' => 'RainLab\User\Models\User'
    ];
}
