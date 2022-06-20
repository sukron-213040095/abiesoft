<?php

namespace AbieSoft\Http;

class Request
{

    protected static $pageAccess = false;
    protected static $actionAccess = [];
    protected function accessCheck($page): bool
    {
        $all_page = ['home', 'users'];
        foreach ($all_page as $ap) {
            if ($page == $ap) {
                self::$pageAccess =  true;
                self::$actionAccess =  [];
                return true;
            }
        }
        return false;
    }

    protected function getMethod(): string
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    protected function getRequest()
    {
        return (isset($_REQUEST)) ? $_REQUEST : false;
    }

    protected function getCurrent($method)
    {
        $path = $_SERVER["REQUEST_URI"] ?? "/";
        if ($_REQUEST) {
            if ($method == 'post') {
                $path = $path;
            } else {
                $path = explode("?", $path)[0];
                $request = "";
                foreach ($_REQUEST as $k => $v) {
                    $request .= "{:" . $k . "}";
                }
                $path = $path . $request;
            }
        } else {
            if (count(explode("/", $path)) > 2) {
                if (count(explode("-", $path)) > 1) {
                    $path = "/" . explode("/", $path)[1] . "/" . "{:nama}";
                } else {
                    $path = $path;
                }
            } else {
                $path = $path;
            }
        }

        if (rtrim($path, '/') == '') {
            $path = '/';
        } else {
            $path = rtrim($path, '/');
        }
        return str_replace("'", "", $path);
    }

    protected function getSession($path)
    {
        $sc = explode("?", explode("/", $path)[1])[0];
        $auth = \AbieSoft\Auth\AuthController::isLogin();

        return $path;
        die();

        /*
        if (
            $sc == "login"
            or $sc == "wellcome"
            or $sc == "syaratketentuan"
            or $sc == "registrasi"
            or $sc == "konfirmasi{:rid}"
            or $sc == "reset{:rid}"
            or $sc == "webservice"
            or $sc == "set_login"
            or $sc == "set_registrasi"
            or $sc == "set_konfirmasi"
            or $sc == "set_reset"
            or $sc == "remove"
        ) {
            if ($auth) {
                return "index";
            } else {
                return $path;
            }
        } else {
            if (!$auth) {
                return "secure";
            } else {
                return $path;
            }
        }
        */
    }
}
