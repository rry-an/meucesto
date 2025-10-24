<?php
final class AuthController extends Controller {
    private UserRepository $users;
    private Validator $validator;
    private NotificationSystem $notificationSystem;
    
    public function __construct(){ 
        $this->users = new UserRepository(); 
        $this->validator = new Validator(new UserValidationStrategy());
        $this->notificationSystem = NotificationSystem::getInstance();
    }

    public function login(): string {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $email = trim($_POST['email'] ?? '');
            $pass = $_POST['password'] ?? '';
            $u = $this->users->findByEmail($email);
            if ($u && password_verify($pass, $u['password_hash'])){
                $_SESSION['user_id'] = (int)$u['id'];
                $_SESSION['user_name'] = $u['name'];
                
                // Notifica sobre login bem-sucedido
                $this->notificationSystem->notify('user_login', [
                    'user_id' => $u['id'],
                    'email' => $email
                ]);
                
                $this->redirect('index.php?controller=feira&action=dashboard');
            } else {
                $error = 'Credenciais inválidas.';
                return $this->view('auth/login', compact('error'));
            }
        }
        return $this->view('auth/login');
    }

    public function register(): string {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $name = trim($_POST['name'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $pass = $_POST['password'] ?? '';
            
            // Usa Strategy para validação
            $errors = $this->validator->validate([
                'name' => $name,
                'email' => $email,
                'password' => $pass
            ]);
            
            if (!empty($errors)) {
                $error = implode(', ', $errors);
                return $this->view('auth/register', compact('error'));
            }
            
            if ($this->users->findByEmail($email)){
                $error = 'E-mail já cadastrado.';
                return $this->view('auth/register', compact('error'));
            }
            
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $id = $this->users->create(new User($name,$email,$hash));
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;
            
            // Notifica sobre novo registro
            $this->notificationSystem->notify('user_register', [
                'user_id' => $id,
                'name' => $name,
                'email' => $email
            ]);
            
            $this->redirect('index.php?controller=feira&action=dashboard');
        }
        return $this->view('auth/register');
    }

    public function logout(): void {
        // Notifica sobre logout
        if (isset($_SESSION['user_id'])) {
            $this->notificationSystem->notify('user_logout', [
                'user_id' => $_SESSION['user_id']
            ]);
        }
        
        session_destroy();
        $this->redirect('../index.html');
    }
}
