<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthService
{
    protected $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function store($data)
    {
        return $this->authRepository->store($data);
    }

    public function show($id)
    {
        return $this->authRepository->show($id);
    }

    public function all()
    {
        return $this->authRepository->all();
    }

    public function update($data, $id)
    {
        return $this->authRepository->update($data, $id);
    }
}