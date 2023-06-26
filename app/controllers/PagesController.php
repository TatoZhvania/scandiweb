<?php

namespace App\Controllers;

class PagesController
{
    public function home()
    {
        return view('index');
    }

    public function product()
    {
        return view('product');
    }
}
