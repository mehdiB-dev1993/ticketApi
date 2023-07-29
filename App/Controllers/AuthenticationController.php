<?php

namespace App\Controllers;


use App\Config\PublicDefine;
use App\Config\Rs_Config;
use App\Core\Respond;
use App\Helper\Func;
use App\Models\AuthenticationModel;
use App\Service\Jwt;


class AuthenticationController
{
    private $model;
    public function Login()
    {
        $this->model = new AuthenticationModel();
        $result = $this->model->login();

        if($result == null) {
            Respond::Respond(Func::StatusArray(Rs_Config::$statusTexts[Rs_Config::HTTP_NOT_FOUND],PublicDefine::$pubDef['ERROR_LOGIN_MESSAGE'],PublicDefine::$pubDef['ERROR_LOGIN_DESCRIPTION']), Rs_Config::HTTP_NOT_FOUND, Rs_Config::$statusTexts[Rs_Config::HTTP_NOT_FOUND]);
        }else {

            session_start();
            $_SESSION['userID'] = $result[0]['userID'];
            $_SESSION['userAcl'] = $result[0]['ACL'];;
            $_SESSION['aliasName'] = $result[0]['aliasName'];
            $token = Jwt::Encode();
            Respond::Respond(Func::StatusArray(Rs_Config::$statusTexts[Rs_Config::HTTP_ACCEPTED],PublicDefine::$pubDef['SUCCESS_MESSAGE'],PublicDefine::$pubDef['SUCCESS_LOGIN_DESCRIPTION'],$token), Rs_Config::HTTP_ACCEPTED, Rs_Config::$statusTexts[Rs_Config::HTTP_ACCEPTED]);
        }

    }
}
