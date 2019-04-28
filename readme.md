## 一个简单的laravel ioc demo 实现

## 使用

### 安装
`git clone https://github.com/sushengbuhuo/laravel_ioc_demo.git`

本demo使用的5.5版本 ` composer create-project laravel/laravel=5.5.* demo --prefer-dist`

### 测试
```js
cd laravel_ioc_demo/public
php -S localhost:8000

浏览器访问 
localhost:8000/ioc 
localhost:8000/ioc-another 
```

## 依赖注入
```js
  interface Board {
        public function type();
    }

    class CommonBoard implements Board {
        public function type(){
            echo '普通键盘';
        }
    }

    class MechanicalKeyboard implements Board {
        public function type(){
            echo '机械键盘';
        }
    }

    class Computer {
        protected $keyboard;

        public function __construct (Board $keyboard) {
            $this->keyboard = $keyboard;
        }
    }

    $computer = new Computer(new MechanialKeyBoard());
```
## ioc 服务容器(类依赖管理)
```js
//下面代码来自https://learnku.com/articles/19195#topnav
class Container
{
    protected $binds;

    protected $instances;

    public function bind($abstract, $concrete)
    {
        if ($concrete instanceof Closure) {
            $this->binds[$abstract] = $concrete;
        } else {
            $this->instances[$abstract] = $concrete;
        }
    }

    public function make($abstract, $parameters = [])
    {
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }

        array_unshift($parameters, $this);//闭包的时候第一个参数为$this

        return call_user_func_array($this->binds[$abstract], $parameters);
    }
}
   $container = new Container;

    $container->bind('Board', function($container){
        return new CommonBoard;
    });
    //当我需要Computer类的时候你就给我实例化Computer类
    $container->bind('Computer',function($container,$module){
        return new Computer($container->make($module));
    });

    $computer = $container->make('Computer',['Board']);//对Computer进行生产返回一个实例。

    更换键盘怎么办呢？

    $container->bind('Board', function($container){
        return new MechanicalBoard;
    });

    $container->bind('Computer',function($container,$module){
        return new Computer($container->make($module));
    });

    $computer = $container->make('Computer',['Board']);
```

### 纯PHP版

[依赖注入](https://github.com/iiDestiny/dependency-injection)