<?php

namespace App\Repositories\Constracts;

interface RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);
}