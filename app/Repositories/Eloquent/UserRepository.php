<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\UserInterface;
use App\Models\User;

class UserRepository extends BaseRepository implements UserInterface
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return User::class;
    }
}