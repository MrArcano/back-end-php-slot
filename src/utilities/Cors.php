<?php
class Cors
{
    public static function handle($corsConfig)
    {
        if (isset($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'], $corsConfig['allowed_origins'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        }

        header('Access-Control-Allow-Methods: GET, POST');
        header('Access-Control-Allow-Headers: Content-Type');
    }
}
