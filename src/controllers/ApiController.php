<?php

require_once ('../src/Utility.php');
require_once ('../src/models/SlotDAO.php');

class ApiController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getReelsSlot()
    {
        // Set the response content type to JSON
        header('Content-Type: application/json');

        // Genera i simboli del slot
        $data = Utility::generateSlotSymbols();

        // Salva nel database
        $executionResult = SlotDAO::saveToDatabase($this->db, $data);

        // Rispondi con JSON
        if ($executionResult) {
            $response = [
                'status' => 'success',
                'data' => $data
            ];
        } else {
            $response = [
                'status' => 'failure',
                'data' => []
            ];
        }

        echo json_encode($response);
    }
}