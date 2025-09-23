<?php
// Inheritance + Polymorphisim
require_once __DIR__ . '/User.php';

class AdminUser extends User
{
    private array $permissions;

    public function __construct(string $username, string $password, array $permissions = [], bool $isHashed = false)
    {
        parent::__construct($username, $password, $isHashed);
        $this->permissions = $permissions;
    }

    public function getRole(): string
    {
        return "admin";
    }

    public function getPermissions(): array
    {
        return $this->permissions;
    }
}

