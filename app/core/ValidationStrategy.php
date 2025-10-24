<?php
/**
 * Padrão Strategy - Interface para estratégias de validação
 */
interface ValidationStrategy {
    public function validate(array $data): array;
}

/**
 * Estratégia de validação para usuários
 */
class UserValidationStrategy implements ValidationStrategy {
    public function validate(array $data): array {
        $errors = [];
        
        if (empty($data['name']) || strlen($data['name']) < 2) {
            $errors[] = 'Nome deve ter pelo menos 2 caracteres';
        }
        
        if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email inválido';
        }
        
        if (empty($data['password']) || strlen($data['password']) < 6) {
            $errors[] = 'Senha deve ter pelo menos 6 caracteres';
        }
        
        return $errors;
    }
}

/**
 * Estratégia de validação para feiras
 */
class FeiraValidationStrategy implements ValidationStrategy {
    public function validate(array $data): array {
        $errors = [];
        
        if (empty($data['name']) || strlen($data['name']) < 3) {
            $errors[] = 'Nome da feira deve ter pelo menos 3 caracteres';
        }
        
        if (empty($data['location'])) {
            $errors[] = 'Localização é obrigatória';
        }
        
        if (empty($data['date'])) {
            $errors[] = 'Data é obrigatória';
        }
        
        return $errors;
    }
}

/**
 * Estratégia de validação para lojas
 */
class LojaValidationStrategy implements ValidationStrategy {
    public function validate(array $data): array {
        $errors = [];
        
        if (empty($data['name']) || strlen($data['name']) < 2) {
            $errors[] = 'Nome da loja deve ter pelo menos 2 caracteres';
        }
        
        if (empty($data['description'])) {
            $errors[] = 'Descrição é obrigatória';
        }
        
        return $errors;
    }
}

/**
 * Contexto que usa as estratégias de validação
 */
class Validator {
    private ValidationStrategy $strategy;
    
    public function __construct(ValidationStrategy $strategy) {
        $this->strategy = $strategy;
    }
    
    public function setStrategy(ValidationStrategy $strategy): void {
        $this->strategy = $strategy;
    }
    
    public function validate(array $data): array {
        return $this->strategy->validate($data);
    }
}