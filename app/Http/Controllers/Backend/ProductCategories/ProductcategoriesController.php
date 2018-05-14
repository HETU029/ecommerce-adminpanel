<?php

namespace App\Http\Controllers\Backend\ProductCategories;

use App\Models\ProductCategory\Productcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\ProductCategory\ProductcategoryRepository;
use App\Http\Requests\Backend\ProductCategory\ManageProductcategoryRequest;
use App\Http\Requests\Backend\ProductCategory\CreateProductcategoryRequest;
use App\Http\Requests\Backend\ProductCategory\StoreProductcategoryRequest;
use App\Http\Requests\Backend\ProductCategory\EditProductcategoryRequest;
use App\Http\Requests\Backend\ProductCategory\UpdateProductcategoryRequest;
use App\Http\Requests\Backend\ProductCategory\DeleteProductcategoryRequest;

/**
 * ProductcategoriesController
 */
class ProductcategoriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProductcategoryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ProductcategoryRepository $repository;
     */
    public function __construct(ProductcategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Product Category\ManageProductcategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageProductcategoryRequest $request)
    {
        return view('backend.productcategories.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateProductcategoryRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateProductcategoryRequest $request)
    {
        return view('backend.productcategories.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProductcategoryRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductcategoryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return redirect()->route('admin.productcategories.index')->withFlashSuccess(trans('alerts.backend.productcategories.created'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Product Category\Productcategory  $productcategory
     * @param  EditProductcategoryRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Productcategory $productcategory, EditProductcategoryRequest $request)
    {
        return view('backend.productcategories.edit', compact('productcategory'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductcategoryRequestNamespace  $request
     * @param  App\Models\Product Category\Productcategory  $productcategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductcategoryRequest $request, Productcategory $productcategory)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $productcategory, $input );
        //return with successfull message
        return redirect()->route('admin.productcategories.index')->withFlashSuccess(trans('alerts.backend.productcategories.updated'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteProductcategoryRequestNamespace  $request
     * @param  App\Models\Product Category\Productcategory  $productcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productcategory $productcategory, DeleteProductcategoryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($productcategory);
        //returning with successfull message
        return redirect()->route('admin.productcategories.index')->withFlashSuccess(trans('alerts.backend.productcategories.deleted'));
    }
    
}
