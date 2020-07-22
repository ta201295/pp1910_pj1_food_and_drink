<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\ProductInterface;
use App\Models\Product;
use App\Models\Category;

class ProductRepository extends BaseRepository implements ProductInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Product::class;
    }

    public function findBySlug($slug)
    {
        return $this->_model::whereSlug($slug)->firstOrFail();
    }

    public function findByCategory($id)
    {
        
        $category = Category::whereId($id)->firstOrFail();

        return $this->_model::where('category_id', $category->id);
    }

    public function deleteBySlug($slug)
    {
        return $this->_model::whereSlug($slug)->delete();
    }

    public function updateBySlug($slug, array $attributes)
    {
        $result = $this->findBySlug($slug);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }
}