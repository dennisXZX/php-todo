<?php

class Request {
    // a static method returns a trimmed URI string
    public static function uri() {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
        );
    }

    public static function method() {
        return $_SERVER['REQUEST_METHOD'];
    }
}