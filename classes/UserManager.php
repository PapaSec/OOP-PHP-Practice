<?php
// classes/UserManager.php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/User.php';

class UserManager {
    private PDO $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function register(string $username, string $password): bool {
        $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $stmt = $this->conn->prepare($sql);

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        try {
            return $stmt->execute([
                ':username' => $username,
                ':password' => $hashed
            ]);
        } catch (PDOException $e) {
            return false; // e.g. duplicate username
        }
    }

    public function login(string $username, string $password): ?User {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':username' => $username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && password_verify($password, $row['password'])) {
            return new User($row['username'], $row['password']);
        }
        return null;
    }
}
