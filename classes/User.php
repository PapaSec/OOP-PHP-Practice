<?php
// Encapsulation, constructor, and password handling
class User 
{
    protected string $username;
    protected string $passwordHash;

    public function __construct( $username, $password)
    {
        $this->username = $username;
        $this->passwordHash = password_hash( $password, PASSWORD_DEFAULT );
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function verifyPassword($password)
    {
        return password_verify($password, $this->passwordHash);
    }

    public function getRole()
    {
        return "user";
    }
}