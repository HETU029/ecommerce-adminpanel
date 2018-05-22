<?php

namespace App\Repositories\Backend\Product;

use DB;
use Carbon\Carbon;
use App\Models\Product\Product;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Product::class;

    protected $upload_path;

    /**
     * Storage Class Object.
     *
     * @var \Illuminate\Support\Facades\Storage
     */
    protected $storage;

    public function __construct()
    {
        $this->upload_path = 'images'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

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
                config('module.products.table').'.id',
                config('module.products.table').'.name',
                config('module.products.table').'.publish_datetime',
                config('module.products.table').'.price',
                config('module.products.table').'.status',
                config('module.products.table').'.image',
                config('module.products.table').'.content',
                config('module.products.table').'.created_at',
                config('module.products.table').'.updated_at',
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
        $input['publish_datetime'] = Carbon::parse($input['publish_datetime']);
        $input = $this->uploadImage($input);
        $input['slug'] = str_slug($input['name']);
        if(Product::create($input)){
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.products.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Product $product
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Product $product, array $input)
    {
        $input['publish_datetime'] = Carbon::parse($input['publish_datetime']);
          // Uploading Image
        if (array_key_exists('image', $input)) {
            $this->deleteOldFile($product);
            $input = $this->uploadImage($input);
        }

    	if ($product->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.products.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Product $product
     * @throws GeneralException
     * @return bool
     */
    public function delete(Product $product)
    {
        if ($product->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.products.delete_error'));
    }

      /**
     * Upload Image.
     *
     * @param array $input
     *
     * @return array $input
     */
    public function uploadImage($input)
    {
        $avatar = $input['image'];

        if (isset($input['image']) && !empty($input['image'])) {
            $fileName = time().$avatar->getClientOriginalName();

            $this->storage->put($this->upload_path.$fileName, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['image' => $fileName]);

            return $input;
        }
    }

    /**
     * Destroy Old Image.
     *
     * @param int $id
     */
    public function deleteOldFile($model)
    {
        $fileName = $model->image;

        return $this->storage->delete($this->upload_path.$fileName);
    }
}
