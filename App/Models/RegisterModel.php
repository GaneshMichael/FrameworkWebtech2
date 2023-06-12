<?php

namespace app\App\Models;

use app\App\core\Database;
use app\App\core\Model;


class RegisterModel extends Model
{
    protected $db;
    public string $firstName = '';
    public string $lastName = '';
    public string $password = '';
    public string $email = '';
    public string $confirmPassword = '';

    public function __construct()
    {
        $this->db = new Database();
        $this->db->connect();
    }

    public function register()
    {
        // Controleer of de gebruiker al bestaat
        if ($this->userExists($this->firstName, $this->lastName, $this->email)) {
            return false;
        }

        // Genereer een wachtwoordhash
        $passwordHash = password_hash($this->password, PASSWORD_DEFAULT);

        // Voer de databasequery uit om een nieuwe gebruiker aan te maken
        $query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $result = $this->db->execute($query, [$this->username, $passwordHash, $this->email]);

        // Return het resultaat van de databasequery (bijv. het ingevoegde gebruikers-ID)
        if ($result) {
            return $this->db->getLastInsertId();
        } else {
            return false;
        }
    }

    public function registerUser($username, $password, $email)
    {
        // Controleer of de gebruiker al bestaat
        if ($this->userExists($username, $email)) {
            return false;
        }

        // Genereer een wachtwoordhash
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // Voer de databasequery uit om een nieuwe gebruiker aan te maken
        $query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
        $result = $this->db->execute($query, [$username, $passwordHash, $email]);

        // Return het resultaat van de databasequery (bijv. het ingevoegde gebruikers-ID)
        if ($result) {
            return $this->db->getLastInsertId();
        } else {
            return false;
        }
    }

    public function userExists($firstname, $email)
    {
        // Controleer of de gebruiker al bestaat op basis van gebruikersnaam of e-mail
        $query = "SELECT COUNT(*) FROM users WHERE firstname = ? OR email = ?";
        $result = $this->db->fetchColumn($query, [$firstname, $email]);

        return ($result > 0);
    }

    // Andere methoden die nodig zijn voor het registratieproces
}
