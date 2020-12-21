<?php
namespace App\Ultility;

class Session {

    public static function init() {
        if (empty(session_id())) {
            session_start();
        }
    }

    public static function destroy() {
        session_destroy();
    }

    public static function exists($key) {
        return isset($_SESSION[$key]);
    }

    public static function put($key, $value) {
        return ($_SESSION[$key] = $value);
    }

    public static function get($key) {
        if (self::exists($key)) {
            return $_SESSION[$key];
        }
    }

    public static function delete($key) {
        if (self::exists($key)) {
            unset($_SESSION[$key]);
            return true;
        }

        return false;
    }

}