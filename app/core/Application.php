<?php

namespace MvcLearning\app\core;

use MvcLearning\app\core\Controller;

class Application
{
    private Router $router;
    private Request $request;
    private Controller $controller;
    private Response $response;
    private static string $ROOT_DIR;
    private static $instance;

    /**
     * @return string
     */
    public static function getROOTDIR(): string
    {
        return self::$ROOT_DIR;
    }
    /**
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    private function __construct($rootPath) {
        self::$ROOT_DIR = $rootPath;
        $this->request = new Request();
        $this->response = new Response();
        $this->controller = new Controller();
        $this->router = new Router($this->request, $this->response);
    }
    public static function getInstance() {
    if (!isset(self::$instance)) {
    self::$instance = new self(dirname(__DIR__));
    }
    return self::$instance;
    }

    public function run()
    {
        echo $this->router->resolve();
    }

    /**
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    public function getController(): \MvcLearning\app\core\Controller
    {
        return $this->controller;
    }

    public function setController(\MvcLearning\app\core\Controller $controller): void
    {
        $this->controller = $controller;
    }


}