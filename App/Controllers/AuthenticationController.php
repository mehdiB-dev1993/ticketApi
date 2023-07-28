<?php

namespace App\Controllers;


use App\Config\Rs_Config;
use App\Core\Respond;
use App\Models\AuthenticationModel;


class AuthenticationController
{
    private $model;
    public function Login()
    {
        $this->model = new AuthenticationModel();
        $result = $this->model->login();



        $error = [
            'STATUS' => '0',
            'MESSAGE' => 'ورود شما ناموفق بود',
            'DESCRIPTION' => 'لطفا نام کاربری و رمز عبور خود را چک کنید و سپس دوباره امتحان کنید!'
        ];

        if($result == null) {
            Respond::Respond($error, Rs_Config::HTTP_NOT_FOUND, Rs_Config::$statusTexts[Rs_Config::HTTP_NOT_FOUND]);
        }else {
            $userAcl = $result[0]['ACL'];
            $userID = $result[0]['userID'];
            $aliasName = $result[0]['aliasName'];
            $success = [
                'STATUS' => '1',
                'MESSAGE' => 'ورود شما موفقیت آمیز بود',
                'DESCRIPTION' =>  'را دارید!با توجه به داکیومنت هایی که در اختیار دارید مینوانید عملیت های مورد نظر خودتان را انجام دهید.' . $userAcl. 'گرامی , شما دسترسی برای انجام عملیات های' . $aliasName . 'شما',
                'TOKEN' => 'ASFAFSAFAFFS5F4A5SF4A65FASAF546ASF456A',
            ];

            session_start();
            $_SESSION['userID'] = $userID;
            $_SESSION['userAcl'] = $userAcl;
            $_SESSION['aliasName'] = $aliasName;
            Respond::Respond($success, Rs_Config::HTTP_ACCEPTED, Rs_Config::$statusTexts[Rs_Config::HTTP_ACCEPTED]);
        }

    }
}
