<?php

declare(strict_types=1);

namespace App\Presenter\Http\Controllers\Web;

class WebHomeController
{
    public function __construct() {}

    public function index()
    {
        return view('home');
    }
}
