<?php

namespace App\Http\Controllers\Backend\ProductCategories;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\ProductCategory\ProductcategoryRepository;
use App\Http\Requests\Backend\ProductCategory\ManageProductcategoryRequest;

/**
 * Class ProductcategoriesTableController.
 */
class ProductcategoriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProductcategoryRepository
     */
    protected $productcategory;

    /**
     * contructor to initialize repository object
     * @param ProductcategoryRepository $productcategory;
     */
    public function __construct(ProductcategoryRepository $productcategory)
    {
        $this->productcategory = $productcategory;
    }

    /**
     * This method return the data of the model
     * @param ManageProductcategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageProductcategoryRequest $request)
    {
        return Datatables::of($this->productcategory->getForDataTable())
            ->escapeColumns(['id', 'name'])
            ->addColumn('status', function ($productcategory) {
                return $productcategory->status_label;
            })
            ->addColumn('created_by', function ($productcategory) {
                return $productcategory->user_name;
            })
            ->addColumn('created_at', function ($productcategory) {
                return Carbon::parse($productcategory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($productcategory) {
                return $productcategory->action_buttons;
            })
            ->make(true);
    }
}
