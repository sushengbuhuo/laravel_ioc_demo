<?php 
namespace App\Ioc;
class DemoProvider2 implements DemoInterface
{
    public function demo1()
    {
        return 'demo1的第二种实现';
    }
    public function demo2()
    {
        return 'demo2的第二种实现';
    }
}