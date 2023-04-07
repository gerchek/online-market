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

    protected $fillable = ['farmer_id'];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    // public $attachMany = [
    //     'images' => 'System\Models\File'
    // ];

    public $attachMany = ['images' => ['System\Models\File', 'delete' => 'true' ]];

    public function afterDelete() {
        foreach ($this->images as $image) {
            $image->delete();
        }
        // foreach ($this->files as $file) {
        //     $file->delete();
        // }
    }

    public $belongsTo = [
        'farmer' => 'RainLab\User\Models\User',
        'category' => 'Gerchek\Products\Models\Category'
    ];

}
