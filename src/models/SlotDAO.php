<?php

class SlotDAO
{
    public static function saveToDatabase($db, $data)
    {
        try {
            // Prepare the SQL statement
            $stmt = $db->getConnection()->prepare("INSERT INTO slot_matrices (matrix, created_at) VALUES (:matrix, NOW())");

            // Bind the parameter
            $stmt->bindValue(":matrix", json_encode($data), PDO::PARAM_STR);
            $executionResult = $stmt->execute();

            // Close connection
            $stmt->closeCursor();
            $db->closeConnection();

            return $executionResult;
        } catch (PDOException $e) {
            // Gestione degli errori
            error_log("Errore durante il salvataggio nel database: " . $e->getMessage());
            return false;
        }
    }
}
