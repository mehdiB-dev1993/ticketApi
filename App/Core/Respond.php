<?php
namespace App\Core;

class Respond
{
    public static function Respond($data,$statusCode,$statusText)
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json charset=UTF-8');
        header('Access-Control-Allow-Method:GET,POST');
        header('Access-Control-Max-Age: 3600');
        header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization');
        header("HTTP/1.1 " .$statusCode . $statusText);
        echo json_encode($data);

    }

}