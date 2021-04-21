<?php 

namespace App\Services;

class Redirect {

    public static $root = __DIR__ . "/";

    public static function backWithSuccess($message = 0)
    {
        // If string send as argument, set session
        if($message) {
            Notification::success($message);
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public static function backWithError($message = 0)
    {
        // If string send as argument, set session
        if($message) {
            Notification::error($message);
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public static function back()
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

}