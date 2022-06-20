<?php

namespace AbieSoft\Http;

class Route extends Request
{

    protected static array $routes = [];

    public static function get($path, $callback)
    {
        return self::$routes['get'][$path] = $callback;
    }

    public static function post($path, $callback)
    {
        return self::$routes['post'][$path] = $callback;
    }

    public static function sistem($class)
    {
        Route::get('/login', [$class, 'login']);
        Route::get('/wellcome', [$class, 'wellcome']);
        Route::get('/syaratketentuan', [$class, 'syaratketentuan']);
        Route::get('/logout', [$class, 'logout']);
        Route::post('/set_login', [$class, 'setLogin']);
        Route::get('/konfirmasi{:rid}', [$class, 'konfirmasi']);
        Route::post('/set_konfirmasi', [$class, 'setKonfirmasi']);
        Route::get('/reset{:rid}', [$class, 'reset']);
        Route::post('/set_reset', [$class, 'setReset']);
        Route::get('/registrasi', [$class, 'registrasi']);
        Route::post('/set_registrasi', [$class, 'setRegistrasi']);
        Route::get('/remove', [$class, 'removeLockscreen']);
    }

    public function setCurrentPage()
    {
        $method = $this->getMethod();
        $request = $this->getRequest();
        $current =  $this->getCurrent($method);
        $session =  $this->getSession($current);

        $callback = self::$routes[$method][$current] ?? false;
        $controller = new Controller();

        if ($session == "index") {
            Lanjut::ke("/");
        } else if ($session == "secure") {
            if (\AbieSoft\Utilities\Define::$showoffWellcome) {
                Lanjut::ke("/wellcome");
            } else {
                Lanjut::ke("/login");
            }
        }

        if (!$callback) {
            return $controller->view(page: "../theme/error/404", data: ['title' => 'Error 404', 'authButton' => \App\Controllers\TemplateController::authButton(),]);
        }

        if (is_string($callback)) {
            die($callback);
        }

        if (is_array($callback)) {
            if ($method == "post") {
                return $this->isPost(request: $request, callback: $callback);
            } else {
                return $this->isGet(request: $request, callback: $callback);
            }
        }

        echo call_user_func($callback);
    }

    protected function isPost($request, $callback)
    {
        $controller = new $callback[0]();
        $func = $callback[1];
        if ($request) {
            return $controller->$func($request);
        } else {
            return $controller->$func();
        }
    }

    protected function isGet($request, $callback)
    {
        $controller = new $callback[0]();
        $func = $callback[1];
        if ($request) {
            return $controller->$func($request);
        } else {
            return $controller->$func();
        }
    }
}
