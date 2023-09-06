<?php

namespace MvcLearning\public\core;

class Router
{
    private array $routes;
    private Request $request;
    private Response $response;

    /**
     * @param Request $request
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path,$callback)
    {
        $this->routes['get'][$path]=$callback;
    }
    public function post($path,$callback)
    {
        $this->routes['post'][$path]=$callback;
    }
    public function resolve()
    {
        $path = $this->request->getPath();
        $method= $this->request->method();

        $callback= $this->routes[$method][$path] ?? false;

        if (!$callback){
            $this->response->setStatusCode(404);
            return $this->renderView('404');
        }
        if (is_string($callback)){
            return $this->renderView($callback);
        }
        if (is_array($callback)){
            Application::getInstance()->setController(new $callback[0]);
            $callback[0] = Application::getInstance()->getController();
        }
        return call_user_func($callback);
    }

    public function renderView($view,  $params = []) : string
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view, $params);
        if(isset($_SESSION['user_name'])){
            $layoutContent = str_replace('{{'.'loginRegister'.'}}',$this->renderOnlyView("profile"),$layoutContent);
        }else{
            $layoutContent = str_replace('{{'.'loginRegister'.'}}',$this->renderOnlyView("loginRegister"),$layoutContent);
        }
        $layoutContent = str_replace('{{title}}',$view,$layoutContent);
        return str_replace('{{content}}',$viewContent,$layoutContent);
    }
    public function layoutContent(): string
    {
        $layout = Application::getInstance()->getController()->getLayout();
        ob_start();
        include_once Application::getROOTDIR()."/../app/view/layout/$layout.php";
        return ob_get_clean();
    }
    public function renderOnlyView($view, $params=[] ) : string
    {
        foreach ($params as $key => $param){
            $$key= $param;
        }
        ob_start();
        include_once Application::getROOTDIR()."/../app/view/$view.php";
        return ob_get_clean();
    }
    public function asset($folder,$file) : string
    {
        return __DIR__."../$folder/$file";
    }
    public function url($url) : string
    {
        return trim('http://localhost:8000/','/').Application::getROOTDIR().'/'.trim($url,'/');
    }
    public function redirect($path , $time = 0) : void
    {
        header("Refresh:$time;url=".trim('http://localhost:8000/','/').'/'.trim($path,'/'));
        exit();
    }

    /**
     * @return array
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

}