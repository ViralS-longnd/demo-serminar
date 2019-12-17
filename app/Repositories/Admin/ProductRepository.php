<?php

namespace App\Repositories\Admin;

use App\Exceptions\ProductNotFoundException;
use App\Models\Admin\Product;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Class ProductRepository
 * @package App\Repositories\Admin
 * @version December 16, 2019, 1:50 am UTC
*/

class ProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'count'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }

    public function search($productId)
    {
        $product = $this->model->find($productId);
        if (!$product) {
            throw new ProductNotFoundException('Product not found by ID ' . $productId);
//            throw new ModelNotFoundException('Product not found by ID ' . $productId);
        }
        return $product;
    }
}
