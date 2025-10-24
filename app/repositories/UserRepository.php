<?php
final class UserRepository {
    private PDO $pdo;
    public function __construct(){ $this->pdo = Database::pdo(); }
    public function create(User $u): int {
        $stmt = $this->pdo->prepare("INSERT INTO users(name,email,password_hash) VALUES (?,?,?)");
        $stmt->execute([$u->name, $u->email, $u->password_hash]);
        return (int)$this->pdo->lastInsertId();
    }
    public function findByEmail(string $email): ?array {
        $st = $this->pdo->prepare("SELECT * FROM users WHERE email=?");
        $st->execute([$email]);
        $row = $st->fetch();
        return $row ?: null;
    }
    public function findById(int $id): ?array {
        $st = $this->pdo->prepare("SELECT * FROM users WHERE id=?");
        $st->execute([$id]);
        $row = $st->fetch();
        return $row ?: null;
    }
}
