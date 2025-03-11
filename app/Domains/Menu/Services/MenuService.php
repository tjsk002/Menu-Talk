<?php

namespace App\Domains\Menu\Services;

use App\Domains\Menu\Models\Menu;
use App\Models\User;

class MenuService implements MenuServiceInterface
{
    public function __construct(
        private Menu $menu,
    )
    {
    }

    public function getMenuList(User $user)
    {
        return $this->menu->where([
            ['user_id', $user->getId()],
        ])->get();
    }
}