<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
// use Symfony\Component\HttpFoundation\BinaryFileResponse;

class QrController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index($plainText)
    {
        // $image = QrCode::format('png')->size(300)->generate($plainText);
        // return response($image)->header('Content-type','image/png');

        if ($plainText == null) {
            return 'xd';
        }

        $image = QrCode::encoding('UTF-8')->size(500)->generate($plainText);
        return response($image);
    }
}
