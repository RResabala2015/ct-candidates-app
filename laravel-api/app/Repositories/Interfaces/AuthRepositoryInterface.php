<?php

namespace App\Repositories\Interfaces;

use App\Models\User;

interface AuthRepositoryInterface
{
    public function store($data);
    /**
     * Get Task by ID
     */
    public function show($id);

    /**
     * Show All user
     */
    public function all();


    /**
     * Update a user
     */
    public function update($data, $id);

    /**
     * Delete a user
     */
    
}