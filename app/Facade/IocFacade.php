<?php
namespace  App\Facade;
use Illuminate\Support\Facades\Facade;
class IocFacade extends Facade
{
protected static function getFacadeAccessor()
{
    //这里返回的是IocServiceProvider中注册时,定义的字符串https://learnku.com/articles/27934#reply87814
    return 'ioc';
}
}