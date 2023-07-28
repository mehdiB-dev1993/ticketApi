<?php

namespace App\Core;

class Acl
{


    private static $userRoles = array(
        'Admin' => ['Create', 'Read', 'Update', 'Delete','Answer'],
        'Manager' => ['Read', 'Update','Answer'],
        'Employee' => ['Read','Answer'],
        'User' => ['Create'],
    );


    public static function hasAccess($userRole, $permission)
    {
        if (isset(self::$userRoles[$userRole])) {
            return in_array($permission, self::$userRoles[$userRole]);
        }
        return false;
    }
}
