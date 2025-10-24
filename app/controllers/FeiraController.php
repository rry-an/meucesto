<?php
final class FeiraController extends Controller {
    private FeiraRepository $feiraRepo;
    private LojaRepository $lojaRepo;
    private Validator $validator;
    private NotificationSystem $notificationSystem;
    
    public function __construct() {
        $this->feiraRepo = new FeiraRepository();
        $this->lojaRepo = new LojaRepository();
        $this->validator = new Validator(new FeiraValidationStrategy());
        $this->notificationSystem = NotificationSystem::getInstance();
    }

    public function dashboard(): string {
        $this->requireAuth();
        $feira = $this->feiraRepo->findByUser($_SESSION['user_id']);
        $loja = $this->lojaRepo->findByUser($_SESSION['user_id']);
        return $this->view('auth/dashboard', compact('feira','loja'));
    }

    public function form(): string {
        $this->requireAuth();
        $feira = $this->feiraRepo->findByUser($_SESSION['user_id']);
        return $this->view('feira/create', compact('feira'));
    }

    public function save(): void {
        $this->requireAuth();
        
        $data = [
            'name' => trim($_POST['nome'] ?? ''),
            'location' => trim($_POST['endereco'] ?? ''),
            'date' => trim($_POST['horario'] ?? '')
        ];
        
        // Usa Strategy para validação
        $errors = $this->validator->validate($data);
        
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $this->redirect('index.php?controller=feira&action=form');
            return;
        }
        
        $f = new Feira(
            $_SESSION['user_id'],
            $data['name'],
            trim($_POST['endereco'] ?? ''),
            trim($_POST['bairro'] ?? ''),
            trim($_POST['horario'] ?? ''),
            trim($_POST['dias'] ?? '')
        );
        
        $this->feiraRepo->upsert($f);
        
        // Notifica sobre criação/atualização da feira
        $this->notificationSystem->notify('feira_saved', [
            'user_id' => $_SESSION['user_id'],
            'feira_name' => $data['name']
        ]);
        
        $this->redirect('index.php?controller=feira&action=dashboard');
    }

    public function list(): string {
        $items = $this->feiraRepo->all();
        return $this->view('feira/list', compact('items'));
    }
}
