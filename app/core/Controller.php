<?php
abstract class Controller {
    protected function view(string $view, array $params = []): string {
        extract($params);
        ob_start();
        require __DIR__ . '/../views/layouts/header.php';
        require __DIR__ . '/../views/' . $view . '.php';
        require __DIR__ . '/../views/layouts/footer.php';
        return ob_get_clean();
    }

    protected function redirect(string $path): void {
        header("Location: $path");
        exit;
    }

    protected function requireAuth(): void {
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('index.php?controller=auth&action=login');
        }
    }
}
