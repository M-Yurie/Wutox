<?php
namespace App\Core;
class Router {
    protected array $routes = [
        'GET'  => [],
        'POST' => [],
    ];

    public function get(string $path, callable $handler) : void {
        $this->routes['GET'][$this->normalize($path)] = $handler;        
    }
    
    public function post(string $path, callable $handler) : void {
        $this->routes['POST'][$this->normalize($path)] = $handler;        
    }

    protected function normalize(string $path) : string {
        $path = '/'.trim($path,'/');

        if ($path === '//') {
            $path = "/";
        }
        
        return $path;
    }

    public function dispatch(string $path, string $method) {
        $method = strtoupper($method);
        $path   = $this->normalize($path);

        $handler = $this->routes[$method][$path] ?? null;

        if (!$handler) {
            http_response_code(404);
            echo "<h1>404 Not Found</h1>";
            echo "<p>No route for <code>{$method} {$path}</code></p>";
            return;
        }

        call_user_func($handler);
    }
}
?>