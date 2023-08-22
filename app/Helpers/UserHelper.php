<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Arr;

class UserHelper
{
    public static function nameUserHeader()
    {
        $splitName = explode(" ", Auth::user()->name);
        $total = count($splitName);
        return $total <= 1 ? $splitName[0] : $splitName[0] . " " . $splitName[$total - 1];
    }

    public static function hasPermission($titulo, $type = null)
    {
        $user = request()->user() ?? null;
        if ($user) {
            $permissions = $user->permissions();
            foreach ($permissions as $permission) {
                if ($permission['route'] != $titulo)
                    continue;
                if (is_null($type) || ($permission[$type] == true))
                    return true;
                else
                    break;
            }
        }
        return false;
    }
}
