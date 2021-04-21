<?php

namespace App\Services;

class Notification {

    public static function warning($message)
    {
        $_SESSION["warning"] = $message;
        $_SESSION["color"] = 'warning';
        return 1;
    }

    public static function success($message)
    {
        $_SESSION["success"] = $message;
        $_SESSION["color"] = 'success';
        return 1;
    }

    public static function error($message)
    {
        $_SESSION["error"] = $message;
        $_SESSION["color"] = 'danger';

        return 1;
    }


}