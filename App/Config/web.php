<?php

use App\Core\Routes\Route;

Route::Get('/Authentication','Authentication@Login');

Route::Get('/tickets','Ticket@index');

Route::Post('/tickets/add','Ticket@Create');

Route::Post('/tickets/update','Ticket@Update');

Route::Post('/tickets/delete','Ticket@Delete');
