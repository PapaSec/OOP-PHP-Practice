<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/User.php';
require_once __DIR__ . '/AdminUser.php';

class UserManager {
    private PDO $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function register(string $username, string $password): bool {
        $sql = "INSERT INTO users (username, password, role) VALUES (:username, :password, 'user')";
        $stmt = $this->conn->prepare($sql);

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        try {
            return $stmt->execute([
                ':username' => $username,
                ':password' => $hashed
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function login(string $username, string $password): ?User {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':username' => $username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && password_verify($password, $row['password'])) {
            if ($row['role'] === 'admin') {
                // return an AdminUser object
                return new AdminUser($row['username'], $row['password'], ["manage_users", "view_reports"], true);
            } else {
                // return a normal User
                return new User($row['username'], $row['password'], true);
            }
        }
        return null;
    }
}
