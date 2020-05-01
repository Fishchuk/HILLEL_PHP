<?php
namespace Core;

class Router{

    protected $routes = [];

    protected $params = [];

    protected $convertTypes = [
        'd'=> 'int',
        's'=> 'string'
    ];
    public function add($route, $params = [])
    {
        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace('/\{([a-z]+)\}/' , '(?P<\1>[a-z-]+)' , $route);
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)',$route);
        $route = '/^' . $route . '$/i';
        $this->routes[$route] = $params;
    }

    public function getRoutes()
    {
        return $this->routes;
    }


    public function match($url)
    {
        foreach ($this->routes as $route => $params){
            if(preg_match($route, $url, $matches)){
                preg_match_all('|\(\?P<[\w]+>\\\\(\w[\+])\)|',$route, $types);
                $step = 0;
                foreach ($matches as $key => $match){
                    if(is_string($key)){
                        $types[1] = str_replace('+', '', $types[1]);
                        settype($match, $this->convertTypes[$types[1][$step]]);
                        $params[$key] = $match;
                        $step++;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }


    public function getParams()
    {
        return $this->params;
    }

    public function dispatch($url)
    {
        $url = trim($url, '/');
        $url = $this->removeQueryStringVariables($url);

        if($this->match($url)){

            $this->match($url);
            $controller = $this->params['controller'];
            unset($this->params['controller']);
            $controller = $this->convertToStudlyCaps($controller);
            $controller = $this ->getNamespace() . $controller;

            if(class_exists($controller)){
                $action = $this->params['action'];
                unset($this->params['action']);
                $action= $this->convertToCamelCase($action);
                $controller = new $controller;

               call_user_func_array(
                    array(
                        $controller,
                        $action
                    ),
                   $this->params
                );
            }else{
                throw new \Exception("Controller class $controller not found");
            }
        }else{
            throw new \Exception("No route matched.", 404);
        }
    }

    protected function convertToStudlyCaps($string)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    protected function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
    }


    protected function removeQueryStringVariables($url)
    {
        if($url != ''){
            $parts = explode('&', $url, 2);
            if(strpos($parts[0], '=') === false){
                $url = $parts[0];
            }else{
                $url = '';
            }
        }
        return $url;
    }

    protected function getNamespace()
    {
        $namespace = 'App\Controllers\\';

        if (array_key_exists('namespace', $this->params)){
            $namespace .= $this->params['namespace'] . '\\';
        }
        return $namespace;
    }



}