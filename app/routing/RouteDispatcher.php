<?php
/**
 * Created by PhpStorm.
 * User: Stevan
 * Date: 07-Apr-18
 * Time: 12:57
 */

namespace App;
use AltoRouter;

class RouteDispatcher
{

    protected $match;
    protected $controller;
    protected $method;

    /**
     * RouteDispatcher constructor.
     * @param AltoRouter $router
     */
    public function __construct(AltoRouter $router)
    {

        $this->match = $router->match();

        if($this->match) {
            //giving values to controller and method from match array
            list($controller, $method) = explode('@', $this->match['target']);
            $this->controller = $controller;
            $this->method = $method;

            //if we have valid controller class and valid method from the same class
            if(is_callable(array(new $this->controller,$this->method))){
                //calling method from the controller class(second  array is for parametres)
                call_user_func(array(new $this->controller,$this->method),array($this->match['params']));

            }else{
                echo "This method {$this->method} is not defined in this controller {$this->controller}";
            }

        }else{
            header($_SERVER['SERVER_PROTOCOL']. " 404 Not found");
            view('errors/404');
        }
    }

}