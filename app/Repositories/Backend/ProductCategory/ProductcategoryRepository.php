<?php

namespace App\Repositories\Backend\ProductCategory;

use DB;
use Carbon\Carbon;
use App\Models\ProductCategory\Productcategory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductcategoryRepository.
 */
class ProductcategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Productcategory::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.productcategories.table').'.id',
                config('module.productcategories.table').'.created_at',
                config('module.productcategories.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        $productcategory = self::MODEL;
        $productcategory = new $productcategory();
        if ($productcategory->save($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.productcategories.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Productcategory $productcategory
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Productcategory $productcategory, array $input)
    {
    	if ($productcategory->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.productcategories.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Productcategory $productcategory
     * @throws GeneralException
     * @return bool
     */
    public function delete(Productcategory $productcategory)
    {
        if ($productcategory->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.productcategories.delete_error'));
    }
}
