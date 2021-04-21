<?php

namespace App\Services;

class Files {

    // Directory to upload based on siteroot absolute path
    private static $target_dir = SITEROOT . "/img/";

    public static function upload()
    {
        $target_file = self::$target_dir . basename($_FILES["image"]["name"]);

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $result = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        return basename($target_file);
    }

    public static function delete($path)
    {
        $result = unlink(self::$target_dir . $path);

        return $result;
    }
}