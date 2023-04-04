<?php namespace Gerchek\Products\Models;

use Model;

/**
 * Model
 */
class SmsVerify extends Model
{
    use \October\Rain\Database\Traits\Validation;
    protected $fillable = ['phone','code'];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'gerchek_products_smsverify';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
