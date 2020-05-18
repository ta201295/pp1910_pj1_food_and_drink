<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Constracts\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(Request $request)
    {
        $data = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'password' => Hash::make($request->get('password')),
            'avatar' => 'image.jpg',
            'role_id' => '2',
        ];
        
        $this->userRepository->create($data);
    }
}
