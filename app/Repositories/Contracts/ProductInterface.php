<?php

namespace App\Repositories\Contracts;

interface ProductInterface
{
    public function findBySlug($slug);

    public function findByCategory($slug);

    public function deleteBySlug($slug);

    public function updateBySlug($slug, array $attributes);

    // public function rate($request);

    // public function searchByName($key_word);

    // public function storeImage($request);
}