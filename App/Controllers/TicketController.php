<?php

namespace App\Controllers;

use App\Config\Rs_Config;
use App\Core\Acl;
use App\Core\Respond;
use App\Helper\Func;
use App\Models\AuthenticationModel;
use App\Models\TicketModel;

class TicketController

{
    private $model;

    public function __construct()
    {
        $this->model = new TicketModel();
        session_start();
    }

    public function index()
    {

        if (Acl::hasAccess($_SESSION['aliasName'],'Read')){
            $result = $this->model->GetList();

            if(!$result) {
                Respond::Respond($result, Rs_Config::HTTP_NOT_FOUND, Rs_Config::$statusTexts[Rs_Config::HTTP_NOT_FOUND]);
            }else {
                Respond::Respond($result, Rs_Config::HTTP_ACCEPTED, Rs_Config::$statusTexts[Rs_Config::HTTP_ACCEPTED]);
            }
        }
        $error = [
            'STATUS' => '0',
            'MESSAGE' => 'وجود خطا در انجام عملیات',
            'DESCRIPTION' =>   'شما دسترسی برای انجام این عملیات رو ندارید و در صورت بروز مشکل با مذیر سامانه تماس بگیرید'
            ];
        Respond::Respond($error, Rs_Config::HTTP_NOT_FOUND, Rs_Config::$statusTexts[Rs_Config::HTTP_NOT_FOUND]);

    }

    public function Create()
    {
        if (Acl::hasAccess($_SESSION['aliasName'],'Create')) {
            if (Func::ValidTicketParam() === []) {
                unset($_REQUEST['path']);
                $result = $this->model->CreateTicket($_REQUEST);
                Respond::Respond($_REQUEST, Rs_Config::HTTP_CREATED, Rs_Config::$statusTexts[Rs_Config::HTTP_CREATED]);
                exit();
            }
            Respond::Respond(Func::ValidTicketParam(), Rs_Config::HTTP_BAD_REQUEST, Rs_Config::$statusTexts[Rs_Config::HTTP_BAD_REQUEST]);
        }


        $error = [
            'STATUS' => '0',
            'MESSAGE' => 'وجود خطا در انجام عملیات',
            'DESCRIPTION' =>   'شما دسترسی برای انجام این عملیات رو ندارید و در صورت بروز مشکل با مذیر سامانه تماس بگیرید'
        ];
        Respond::Respond($error, Rs_Config::HTTP_NOT_FOUND, Rs_Config::$statusTexts[Rs_Config::HTTP_NOT_FOUND]);


    }


    public function Update()
    {
        if (Acl::hasAccess($_SESSION['aliasName'],'Update')) {
            unset($_REQUEST['path']);
            $id = $_REQUEST['id'];
            unset($_REQUEST['id']);
            $condition = "id = $id";
            $result = $this->model->UpdateTicket($_REQUEST, $condition);
            Respond::Respond($result, Rs_Config::HTTP_CREATED, Rs_Config::$statusTexts[Rs_Config::HTTP_CREATED]);
        }


        $error = [
            'STATUS' => '0',
            'MESSAGE' => 'وجود خطا در انجام عملیات',
            'DESCRIPTION' =>   'شما دسترسی برای انجام این عملیات رو ندارید و در صورت بروز مشکل با مذیر سامانه تماس بگیرید'
        ];
        Respond::Respond($error, Rs_Config::HTTP_NOT_FOUND, Rs_Config::$statusTexts[Rs_Config::HTTP_NOT_FOUND]);
    }

    public function Delete()
    {

        if (Acl::hasAccess($_SESSION['aliasName'],'Delete')) {

            $result = $this->model->DeleteTicket();
            Respond::Respond($result, Rs_Config::HTTP_CREATED, Rs_Config::$statusTexts[Rs_Config::HTTP_CREATED]);
        }

        $error = [
            'STATUS' => '0',
            'MESSAGE' => 'وجود خطا در انجام عملیات',
            'DESCRIPTION' =>   'شما دسترسی برای انجام این عملیات رو ندارید و در صورت بروز مشکل با مذیر سامانه تماس بگیرید'
        ];
        Respond::Respond($error, Rs_Config::HTTP_NOT_FOUND, Rs_Config::$statusTexts[Rs_Config::HTTP_NOT_FOUND]);
    }



}
