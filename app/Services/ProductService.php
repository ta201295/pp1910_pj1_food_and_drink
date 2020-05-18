<?php

namespace App\Services;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ProductInterface;
use Illuminate\Support\Str;

class ProductService
{
    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create(Request $request)
    {
        $data = [
            'category_id' => $request->get('category_id'),
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name', '-')),
            'image' => $request->get('image'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
        ];

        $this->productRepository->create($data);
    }

    public function update(Request $request, $slug)
    {
        $data = [
            'category_id' => $request->get('category_id'),
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name', '-')),
            'image' => $request->get('image'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
        ];
        $product = $this->productRepository->updateBySlug($slug, $data);
        $product_id = $this->productRepository->findBySlug($slug)->id;
        ProductImage::whereProductId($product_id)->delete();
    }
}
