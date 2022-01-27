<?php

use SimpleSoftwareIO\QrCode\Facades\QrCode;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->get('/', function () use ($router) {
    return phpinfo();
});

$router->get('v1[/{plainText}]', function ($plainText = null) {

    if ($plainText == null) {
        $image = ':(';
        return response($image);
    }

    // $image = QrCode::encoding('UTF-8')->size(500)->generate($plainText);
    $cleanText = str_replace('-', ' ', $plainText);
    $image = QrCode::format('png')->encoding('UTF-8')->margin(1)->size(500)->generate($cleanText);
    // return response($image);
    return response($image, 200)
    ->header('Content-Type', 'image/png');

    // $imagen = new Imagick($image);

    // $imagen->blurImage(5, 3);
    
});
