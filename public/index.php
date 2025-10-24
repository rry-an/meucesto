<?php
declare(strict_types=1);
session_start();

require_once __DIR__ . '/../app/config/Database.php';
require_once __DIR__ . '/../app/core/Controller.php';
require_once __DIR__ . '/../app/core/ControllerFactory.php';
require_once __DIR__ . '/../app/core/Observer.php';
require_once __DIR__ . '/../app/core/ValidationStrategy.php';

spl_autoload_register(function($class){
    $base = __DIR__ . '/../app/';
    $paths = ['models', 'repositories', 'controllers', 'core'];
    foreach($paths as $p){
        $file = $base . $p . '/' . $class . '.php';
        if (file_exists($file)) { require_once $file; return; }
    }
});

// Inicializa sistema de notificações
$notificationSystem = NotificationSystem::getInstance();
$notificationSystem->attach(new LogObserver());

$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';

try {
    // Usa Factory Method para criar controller
    $ctrl = ControllerFactory::create($controller);
    
    if (!method_exists($ctrl, $action)) {
        http_response_code(404);
        echo 'Ação não encontrada';
        exit;
    }
    
    // Notifica sobre a ação executada
    $notificationSystem->notify('controller_action', [
        'controller' => $controller,
        'action' => $action,
        'timestamp' => time()
    ]);
    
    echo $ctrl->$action();
    
} catch (InvalidArgumentException $e) {
    http_response_code(404);
    echo 'Controller não encontrado';
    exit;
}
