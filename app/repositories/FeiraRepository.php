<?php
final class FeiraRepository {
    private PDO $pdo;
    public function __construct(){ $this->pdo = Database::pdo(); }
    public function upsert(Feira $f): int {
        // If exists for user, update, else insert
        $row = $this->findByUser($f->user_id);
        if ($row){
            $stmt = $this->pdo->prepare("UPDATE feiras SET nome=?, endereco=?, bairro=?, horario=?, dias_funciona=? WHERE user_id=?");
            $stmt->execute([$f->nome,$f->endereco,$f->bairro,$f->horario,$f->dias_funciona,$f->user_id]);
            return (int)$row['id'];
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO feiras(user_id,nome,endereco,bairro,horario,dias_funciona) VALUES (?,?,?,?,?,?)");
            $stmt->execute([$f->user_id,$f->nome,$f->endereco,$f->bairro,$f->horario,$f->dias_funciona]);
            return (int)$this->pdo->lastInsertId();
        }
    }
    public function findByUser(int $user_id): ?array {
        $st = $this->pdo->prepare("SELECT * FROM feiras WHERE user_id=?");
        $st->execute([$user_id]);
        $row = $st->fetch();
        return $row ?: null;
    }
    public function all(): array {
        return $this->pdo->query("SELECT * FROM feiras ORDER BY id DESC")->fetchAll();
    }
}
