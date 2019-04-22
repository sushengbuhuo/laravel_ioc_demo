<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ioc\DemoInterface;
class TestController extends Controller
{
    public function index()
    {
        $ioc=\App::make('ioc');
        dd($ioc->demo1());
    }

    public function test(DemoInterface $demo)
    {
        dd($demo->demo1());
    }

}
