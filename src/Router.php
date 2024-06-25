<?php

require_once ('controllers/ApiController.php');

class Router
{
    public static function routeRequest($db)
    {
        $path = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';

        switch ($path) {
            case '/api/get-reels-slot':
                $controller = new ApiController($db);
                $controller->getReelsSlot();
                break;
            default:
                self::notFoundResponse();
                break;
        }
    }

    private static function notFoundResponse()
    {
        header("HTTP/1.0 404 Not Found");
        echo json_encode([
            'status' => 'error',
            'message' => 'Endpoint not found'
        ]);
        exit;
    }
}