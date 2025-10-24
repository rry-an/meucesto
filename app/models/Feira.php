<?php
final class Feira {
    public ?int $id = null;
    public int $user_id;
    public string $nome;
    public string $endereco;
    public string $bairro;
    public string $horario;
    public string $dias_funciona;
    public function __construct(int $user_id, string $nome, string $endereco, string $bairro, string $horario, string $dias){
        $this->user_id = $user_id;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->horario = $horario;
        $this->dias_funciona = $dias;
    }
}
