<?php 
class Session {
    public  static function init() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public  static function set($key, $val) {
        self::init();
        $_SESSION[$key] = $val;
    }


    public static function  get($key) {
        self::init();
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public  static function checkSession() {
        self::init();
        if (self::get("user") == false) {
            header("Location:http://ducduckitucxa.epizy.com/login.php");
        }
    }


    public static function checkLogin() {
        self::init();
        if (self::get("user") == true) {
            header("Location:http://ducduckitucxa.epizy.com/index.php");
        }
    }

    public static function destroy() {
        self::init();
        session_destroy();
        header("Location:http://localhost/QuanLyKTX/index.php");
    }
}