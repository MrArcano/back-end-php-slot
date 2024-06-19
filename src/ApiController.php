<?php

require_once('Slot.php');

class ApiController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function handleRequest($config) {

        // Check if the HTTP_ORIGIN is allowed with the config
        if(isset($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'],$config['cors']['allowed_origins'])){
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        }

        // Set the response content type to JSON
        header('Content-Type: application/json');

        // Verifica il metodo HTTP
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method !== 'GET') {
            $response = [
                'status' => 'error',
                'message' => 'Method not allowed'
            ];
            echo json_encode($response);
            return;
        }

        // Gestione del percorso
        $path = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
        if (parse_url($path, PHP_URL_PATH) !== "/api/get-reels-slot") {
            $response = [
                'status' => 'error',
                'message' => 'Endpoint not found'
            ];
            echo json_encode($response);
            return;
        }

        // Genera i simboli del slot
        $slot = Slot::generateSlotSymbols();

        // Salva nel database
        $response = $this->saveSlotToDatabase($slot);

        // Rispondi con JSON
        
        echo json_encode($response);

        // Salva nel database
        
    }

    private function saveSlotToDatabase($slot){
        try {
            // Prepare the SQL statement
            $stmt = $this->db->getConnection()->prepare("INSERT INTO slot_matrices (matrix, created_at) VALUES (:matrix, NOW())");

            // Bind the parameter
            $stmt->bindValue(":matrix", json_encode($slot), PDO::PARAM_STR);

            // Execute the statement
            if ($stmt->execute()) {
                $response = [
                    'status' => 'success',
                    'data' => $slot
                ];
            } else {
                $response = [
                    'status' => 'failure',
                    'data' => []
                ];
            }

            $stmt->closeCursor();
            $this->db->closeConnection();

        } catch (PDOException $e) {
            $response = [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
        return $response;
    }
}
