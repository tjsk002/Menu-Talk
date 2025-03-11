<?php

namespace App\Domains\Menu\Services;

use App\Models\User;

interface MenuServiceInterface {
    public function getMenuList(User $args);
}