<?php
/**
 * Padrão Observer - Interface para observadores
 */
interface Observer {
    public function update(string $event, array $data = []): void;
}

/**
 * Subject que pode ser observado
 */
interface Subject {
    public function attach(Observer $observer): void;
    public function detach(Observer $observer): void;
    public function notify(string $event, array $data = []): void;
}

/**
 * Sistema de notificações usando Observer
 */
class NotificationSystem implements Subject {
    private static ?NotificationSystem $instance = null;
    private array $observers = [];
    
    private function __construct() {}
    
    public static function getInstance(): NotificationSystem {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function attach(Observer $observer): void {
        $this->observers[] = $observer;
    }
    
    public function detach(Observer $observer): void {
        $key = array_search($observer, $this->observers, true);
        if ($key !== false) {
            unset($this->observers[$key]);
        }
    }
    
    public function notify(string $event, array $data = []): void {
        foreach ($this->observers as $observer) {
            $observer->update($event, $data);
        }
    }
}

/**
 * Observer concreto para logs
 */
class LogObserver implements Observer {
    public function update(string $event, array $data = []): void {
        $logMessage = date('Y-m-d H:i:s') . " - Evento: {$event}";
        if (!empty($data)) {
            $logMessage .= " - Dados: " . json_encode($data);
        }
        error_log($logMessage);
    }
}