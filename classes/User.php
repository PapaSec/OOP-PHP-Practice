<?php
// Encapsulation + constructor overloading (normal + from database)
class User 
{
    protected string $username;
    protected string $passwordHash;

    // This constructor will accept *either* raw password or already hashed password
    public function __construct(string $username, string $password, bool $isHashed = false)
    {
        $this->username = $username;
        $this->passwordHash = $isHashed 
            ? $password            // already hashed from DB
            : password_hash($password, PASSWORD_DEFAULT); // raw password
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->passwordHash);
    }

    public function getRole(): string
    {
        return "user";
    }
}
