<?php

use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Routing\Route;
use Nagi\MailRifle\MailController;

Route::group(['as' => 'mailrifle::', 'prefix' => 'mailrifle', 'middleware' => SubstituteBindings::class], function () {
    Route::get('/', MailController::class.'@index')->name('index');
    Route::get('/{mailrifle}', MailController::class.'@show')->name('show');
});
