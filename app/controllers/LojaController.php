<?php
final class LojaController extends Controller {
    private LojaRepository $lojaRepo;
    private Validator $validator;
    private NotificationSystem $notificationSystem;
    
    public function __construct() {
        $this->lojaRepo = new LojaRepository();
        $this->validator = new Validator(new LojaValidationStrategy());
        $this->notificationSystem = NotificationSystem::getInstance();
    }

    public function form(): string {
        $this->requireAuth();
        $loja = $this->lojaRepo->findByUser($_SESSION['user_id']);
        return $this->view('loja/create', compact('loja'));
    }

    public function save(): void {
        $this->requireAuth();
        
        $data = [
            'name' => trim($_POST['nome'] ?? ''),
            'description' => trim($_POST['email'] ?? '') // Usando email como descrição temporária
        ];
        
        // Usa Strategy para validação
        $errors = $this->validator->validate($data);
        
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $this->redirect('index.php?controller=loja&action=form');
            return;
        }
        
        $l = new Loja(
            $_SESSION['user_id'],
            $data['name'],
            trim($_POST['email'] ?? ''),
            trim($_POST['telefone'] ?? '')
        );
        
        $this->lojaRepo->upsert($l);
        
        // Notifica sobre criação/atualização da loja
        $this->notificationSystem->notify('loja_saved', [
            'user_id' => $_SESSION['user_id'],
            'loja_name' => $data['name']
        ]);
        
        $this->redirect('index.php?controller=feira&action=dashboard');
    }

    public function list(): string {
        $items = $this->lojaRepo->all();
        return $this->view('loja/list', compact('items'));
    }
}
