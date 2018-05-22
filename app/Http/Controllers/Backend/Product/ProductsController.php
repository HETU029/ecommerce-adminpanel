<?php

namespace App\Http\Controllers\Backend\Product;

use App\Models\Product\Product;
use App\Models\ProductCategory\Productcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Product\ProductRepository;
use App\Http\Requests\Backend\Product\ManageProductRequest;
use App\Http\Requests\Backend\Product\CreateProductRequest;
use App\Http\Requests\Backend\Product\StoreProductRequest;
use App\Http\Requests\Backend\Product\EditProductRequest;
use App\Http\Requests\Backend\Product\UpdateProductRequest;
use App\Http\Requests\Backend\Product\DeleteProductRequest;

/**
 * ProductsController
 */
class ProductsController extends Controller
{
     /**
     * Product Status.
     */
    protected $status = [
        'Published' => 'Published',
        'Draft'     => 'Draft',
        'InActive'  => 'InActive',
        'Scheduled' => 'Scheduled',
    ];
    /**
     * variable to store the repository object
     * @var ProductRepository
     */
    protected $product;

    /**
     * contructor to initialize repository object
     * @param ProductRepository $repository;
     */
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Product\ManageProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(ManageProductRequest $request)
    { 
        return view('backend.products.index')->with([
            'status'=> $this->status,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateProductRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function create(CreateProductRequest $request)
    {
        $productCategories = Productcategory::all();
        return view('backend.products.create')->with([
            'productCategories' =>  $productCategories,
            'status'=> $this->status,
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProductRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        // dd($input);
        $this->product->create($input);
        //return with successfull message
        return redirect()->route('admin.products.index')->withFlashSuccess(trans('alerts.backend.products.created'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Product\Product  $product
     * @param  EditProductRequestNamespace  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, EditProductRequest $request)
    {
         $productCategories = Productcategory::all();
        return view('backend.products.edit', compact('product'))->with([
            'status'=> $this->status,
             'productCategories' =>  $productCategories,
        ]);;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProductRequestNamespace  $request
     * @param  App\Models\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->product->update( $product, $input );
        //return with successfull message
        return redirect()->route('admin.products.index')->withFlashSuccess(trans('alerts.backend.products.updated'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteProductRequestNamespace  $request
     * @param  App\Models\Product\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, DeleteProductRequest $request)
    {
        //Calling the delete method on repository
        $this->product->delete($product);
        //returning with successfull message
        return redirect()->route('admin.products.index')->withFlashSuccess(trans('alerts.backend.products.deleted'));
    }
    
}
