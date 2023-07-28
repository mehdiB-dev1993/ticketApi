<?php
namespace App\Config;
class Define
{
    private static $SERVERNAME = 'localhost';
    private static $DBNAME = 'main';
    private static $USERNAME = 'root';
    private static $PASSWORD = '';

    public static function GetServerName()
    {return self::$SERVERNAME;}
    public static function GetDbName()
    {return self::$DBNAME;}
    public static function GetUsername()
    {return self::$USERNAME;}
    public static function GetPassword()
    {return self::$PASSWORD;}
}
