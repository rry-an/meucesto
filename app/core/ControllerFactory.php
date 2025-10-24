<?php
/**
 * Padrão Factory Method - Cria controllers de forma centralizada
 */
abstract class ControllerFactory {
    public static function create(string $controllerName): Controller {
        $className = ucfirst($controllerName) . 'Controller';
        
        if (!class_exists($className)) {
            throw new InvalidArgumentException("Controller {$className} não encontrado");
        }
        
        return new $className();
    }
    
    public static function getAvailableControllers(): array {
        return ['auth', 'home', 'feira', 'loja'];
    }
}