<?php

namespace App\Helper;

class Func

{


    public static function ValidTicketParam()
    {
        $errors = array();

        // اعتبارسنجی نام
        if (empty($_REQUEST['name']) || trim($_REQUEST['name']) == '') {
            $errors['name'] = "نام نمی‌تواند خالی باشد.";
        }

        if (empty($_REQUEST['subject']) || trim($_REQUEST['subject']) == '') {
            $errors['subject'] = "عنوان نمی‌تواند خالی باشد.";
        }

        // اعتبارسنجی ایمیل
        if (empty($_REQUEST['email'])) {
            $errors['email'] = "ایمیل نمی‌تواند خالی باشد.";
        } elseif (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "ایمیل وارد شده معتبر نیست.";
        }

        // اعتبارسنجی شماره تلفن (اختیاری)
        if (empty($_REQUEST['message'])) {
            $errors['message'] = "متن تیکت مورد نظر نباید خالی باشد.";
        }

        return $errors;
    }
    
    
}
