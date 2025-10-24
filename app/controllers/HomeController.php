<?php
final class HomeController extends Controller {
    private NotificationSystem $notificationSystem;
    
    public function __construct() {
        $this->notificationSystem = NotificationSystem::getInstance();
    }
    
    public function index(): string {
        // Notifica sobre acesso à página inicial
        $this->notificationSystem->notify('home_access', [
            'timestamp' => time(),
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
        ]);
        
        return $this->view('auth/welcome', []);
    }
}
