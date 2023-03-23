<?php namespace Gerchek\Products\Models;

use Model;

/**
 * Model
 */
class Products extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'gerchek_products_products';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachMany = [
        'images' => 'System\Models\File'
    ];

    public $belongsTo = [
        'farmer' => 'RainLab\User\Models\User',
        'category' => 'Gerchek\Products\Models\Category'
    ];
}
