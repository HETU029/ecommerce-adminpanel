<?php

namespace App\Models\Product;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Traits\ProductAttribute;
use App\Models\Product\Traits\ProductRelationship;

class Product extends Model
{
    use ModelTrait,
        ProductAttribute,
    	ProductRelationship {
            // ProductAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'products';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
         'name',
         'publish_datetime',
         'price',
         'category_name',
         'slug',
         'status',
         'image',
         'content',
         'meta_title',
        'meta_description',

    ];

    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'publish_datetime',
        'created_at',
        'updated_at'
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory\Productcategory','category_name');   
    }
}
