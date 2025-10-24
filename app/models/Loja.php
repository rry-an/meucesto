<?php
final class Loja {
    public ?int $id = null;
    public int $user_id;
    public string $nome;
    public string $email;
    public string $telefone;
    public function __construct(int $user_id, string $nome, string $email, string $telefone){
        $this->user_id = $user_id;
        $this->nome = $nome;
        $this->email = $email;
        $this->telefone = $telefone;
    }
}
