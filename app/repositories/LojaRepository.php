<?php
final class LojaRepository {
    private PDO $pdo;
    public function __construct(){ $this->pdo = Database::pdo(); }
    public function upsert(Loja $l): int {
        $row = $this->findByUser($l->user_id);
        if ($row){
            $st = $this->pdo->prepare("UPDATE lojas SET nome=?, email=?, telefone=? WHERE user_id=?");
            $st->execute([$l->nome,$l->email,$l->telefone,$l->user_id]);
            return (int)$row['id'];
        } else {
            $st = $this->pdo->prepare("INSERT INTO lojas(user_id,nome,email,telefone) VALUES (?,?,?,?)");
            $st->execute([$l->user_id,$l->nome,$l->email,$l->telefone]);
            return (int)$this->pdo->lastInsertId();
        }
    }
    public function findByUser(int $user_id): ?array {
        $st = $this->pdo->prepare("SELECT * FROM lojas WHERE user_id=?");
        $st->execute([$user_id]);
        $row = $st->fetch();
        return $row ?: null;
    }
    public function all(): array {
        return $this->pdo->query("SELECT * FROM lojas ORDER BY id DESC")->fetchAll();
    }
}
