<?php 

class Router
{
    private array $routes = [];
    
    public function __construct() {}


    public function get(string $path, array $action): void
    {
        $this->routes['GET'][$path] = $action;
    }

    public function post(string $path, array $action): void
    {
        $this->routes['POST'][$path] = $action;
    }

    public function dispatch(string $uri)
    {
        // Everything is routed through index.php (.htaccess), therefore Request method is always available
        // making it not necessary to pass to dispatch method
        $method = $_SERVER['REQUEST_METHOD'];

        // Removes the Query component of the URL '/hello?id=1' -> '/hello'
        $path = parse_url($uri,  PHP_URL_PATH);

        // Check if route exists, if it does get the Controller and controller method to be called
        if (isset($this->routes[$method][$path]))
        {
            [$controllerClass, $controllerMethod] = $this->routes[$method][$path];
            $controller = new $controllerClass;

            // Call that controller method
            call_user_func([$controller, $controllerMethod]);
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}
?>