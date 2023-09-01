<?php

namespace MvcLearning\app\core;

class Application
{
    private Router $router;
    private Request $request;
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

}