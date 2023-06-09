<?php
namespace app\App\Models;

use app\App\core\Database;

class Student {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllStudents() {
        $query = "SELECT * FROM student";
        return $this->db->query($query);
    }

    public function createStudent($voornaam, $achternaam, $leeftijd, $opleidingsnaam) {
        $query = "INSERT INTO student (Voornaam, Achternaam, Leeftijd, Opleidingsnaam) VALUES (?, ?, ?, ?)";
        $values = [$voornaam, $achternaam, $leeftijd, $opleidingsnaam];
        return $this->db->execute($query, $values);
    }

    // Andere methoden voor het bijwerken, verwijderen, enz. van studenten
}
