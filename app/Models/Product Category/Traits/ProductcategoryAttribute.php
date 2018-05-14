<?php

namespace App\Models\Product Category\Traits;

/**
 * Class ProductcategoryAttribute.
 */
trait ProductcategoryAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-productcategory", "admin.productcategories.edit").'
                '.$this->getDeleteButtonAttribute("delete-productcategory", "admin.productcategories.destroy").'
                </div>';
    }
}
