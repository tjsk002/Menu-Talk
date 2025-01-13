<?php

namespace App\Domains\Auth\Services;

interface AuthServiceInterface {
    public function findUser(string $email);
    public function create(array $args);
    public function login(array $args);
}