<?php

include '../app/vendor/autoload.php';

route('/', function () {
    $foo = new App\Acme\Foo();
    return $foo->getName();
});

route('/get-data', function () {
    $foo = new App\Acme\Foo();
    return $foo->getTestData();
});

function route(string $path, callable $callback): void
{
    global $routes;
    $routes[$path] = $callback;
}

run();

function run(): void
{
    global $routes;
    $path = $_SERVER['REQUEST_URI'] ?? '/';
    $callback = $routes[$path] ?? null;
    if ($callback) {
        echo call_user_func($callback);
    } else {
        echo 'Page not found';
    }
}
