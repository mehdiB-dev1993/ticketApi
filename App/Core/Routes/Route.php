<?php
namespace App\Core\Routes;
class Route
{
    public static $RS = [];
    public static function Get($uri,$action)
    {
       self::AddRoute('get',$uri,$action);
    }
    public static function Post($uri,$action)
    {
        self::AddRoute('post',$uri,$action);
    }
    public static function AddRoute($method,$uri,$action)
    {
        self::$RS[] = ['METHOD' => $method,'URI' => $uri,'ACTION' => $action];
    }
    public static function Routes()
    {
        return self::$RS;
    }

}