<?php

class Router {
    // initiate the variable for storing routes
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * @summary load the routes into a static Router instance
     * @param $file - a routing file that calls the define() method
     * @return a static Router instance
     */
    public static function load($file) {
        // create an instance of the static Router
        $router = new static();

        // invoke $router->define(routeSetting)
        require $file;

        // return the Router instance for method chaining
        return $router;
    }

    /**
     * @summary map all GET requests to their controllers
     * @param $uri - the URI path
     * @param $controller - the controller path
     */
    public function get($uri, $controller) {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * @summary map all POST requests to their controllers
     * @param $uri - the URI path
     * @param $controller - the controller path
     */
    public function post($uri, $controller) {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * @summary direct the page to the URI provided
     * @param $uri - a string representing the current path
     * @param $requestType - a string representing the request type
     * @return a controller matched to the URI
     * @throws Exception
     */
    public function direct($uri, $requestType) {
        // check if there is a route matching the URI passed in
        if (array_key_exists($uri, $this->routes[$requestType])) {
            return $this->callAction(
              ...explode('@', $this->routes[$requestType][$uri])
            );
        }

        throw new Exception('No route defined for this URI.');
    }

    protected function callAction($controller, $action) {

        $controller = new $controller;

        if (! method_exists($controller, $action)) {
            throw new Exception("{$controller} does not respond to the {$action} action");
        }

        return (new $controller)->$action();
    }

}