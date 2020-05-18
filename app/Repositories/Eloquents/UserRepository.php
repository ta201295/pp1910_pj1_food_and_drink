<?php

namespace App\Repositories\Eloquents;

use App\Models\User;
use App\Repositories\Constracts\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{ 
    public function getModel()
    {
        return User::class;
    }

    // public function update($request, $id)
    // {
    //     return User::whereId($id)->update([
    //         'name' => $request->get('name'),
    //         'email' => $request->get('email'),
    //         'phone' => $request->get('phone'),
    //         'password' => Hash::make($request->get('password')),
    //     ]);
    // }

}