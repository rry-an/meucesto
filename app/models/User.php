<?php
final class User {
    public ?int $id = null;
    public string $name;
    public string $email;
    public string $password_hash;

    public function __construct(string $name, string $email, string $password_hash){
        $this->name = $name;
        $this->email = $email;
        $this->password_hash = $password_hash;
    }
}
