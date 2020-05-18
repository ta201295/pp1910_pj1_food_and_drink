<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Contracts\CategoryInterface;
use Illuminate\Support\Facades\Hash;

class CategoryService
{
    public function __construct(CategoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function create(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
        ];
        
        $this->categoryRepository->create($data);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'name' => $request->get('name'),
        ];

        $this->categoryRepository->update($id, $data);
        
    }
}
