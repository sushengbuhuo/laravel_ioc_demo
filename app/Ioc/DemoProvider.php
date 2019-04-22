<?php 
namespace App\Ioc;
class DemoProvider implements DemoInterface
{
    public function demo1()
    {
        return 'demo1';
    }
    public function demo2()
    {
        return 'demo2';
    }
}