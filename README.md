# Meu Cesto - Sistema de Gestão de Feiras e Lojas

## 👥 Integrantes do Projeto
Integrantes do Grupo:
● Izadora Ive Pereira Alves 22300538
● Ryan Moura Lourenço 22300210
● Guilherme Rocha Martins da Costa 22301160
● Guilherme Henrique Souza Chaves 22301054
● Maria Luiza Alves Gomes 22302506
● Gabriela de São Geraldo Campanha 22302590



## 📋 Descrição do Projeto
Sistema web desenvolvido em PHP com arquitetura MVC para gestão de feiras e lojas. O projeto implementa orientação a objetos, padrão Repository para persistência de dados e múltiplos padrões de projeto GoF.

## ⚡ Funcionalidades Implementadas

### 🔐 Sistema de Autenticação
- [x] Cadastro de usuários com validação
- [x] Login com autenticação segura
- [x] Logout com limpeza de sessão
- [x] Dashboard personalizado

### 🏪 Gestão de Feiras
- [x] Cadastro de feiras
- [x] Edição de informações da feira
- [x] Listagem de todas as feiras
- [x] Validação de dados de entrada

### 🛍️ Gestão de Lojas
- [x] Cadastro de lojas
- [x] Edição de informações da loja
- [x] Listagem de todas as lojas
- [x] Validação de dados de entrada

### 🎯 Funcionalidades Técnicas
- [x] Arquitetura MVC bem estruturada
- [x] Padrão Repository para acesso a dados
- [x] Sistema de notificações com logs
- [x] Validação estratégica por tipo de entidade
- [x] Factory para criação de controllers
- [x] Conexão singleton com banco de dados

## 🏗️ Padrões de Projeto Implementados

### 1. **Singleton** 
**Arquivo:** `app/config/Database.php`
**Justificativa:** Garante uma única instância de conexão com o banco de dados, evitando múltiplas conexões desnecessárias e otimizando recursos.

### 2. **Factory Method**
**Arquivo:** `app/core/ControllerFactory.php`
**Justificativa:** Centraliza a criação de controllers, facilitando manutenção e permitindo extensibilidade futura sem modificar o código cliente.

### 3. **Observer**
**Arquivo:** `app/core/Observer.php`
**Justificativa:** Implementa sistema de notificações desacoplado, permitindo que diferentes partes do sistema sejam notificadas sobre eventos (login, cadastros, etc.) sem dependências diretas.

### 4. **Strategy**
**Arquivo:** `app/core/ValidationStrategy.php`
**Justificativa:** Permite diferentes estratégias de validação para cada tipo de entidade (User, Feira, Loja), facilitando manutenção e extensão de regras de negócio.

## 🛠️ Tecnologias Utilizadas
- **PHP 8.0+** - Linguagem principal
- **MySQL** - Banco de dados
- **PDO** - Abstração de banco de dados
- **HTML5/CSS3** - Interface do usuário
- **Arquitetura MVC** - Padrão arquitetural

## 📁 Estrutura do Projeto
```
site_cesto_v3/
├── app/
│   ├── config/
│   │   └── Database.php          # Singleton para conexão DB
│   ├── controllers/
│   │   ├── AuthController.php    # Autenticação
│   │   ├── FeiraController.php   # Gestão de feiras
│   │   ├── LojaController.php    # Gestão de lojas
│   │   └── HomeController.php    # Página inicial
│   ├── core/
│   │   ├── Controller.php        # Controller base
│   │   ├── ControllerFactory.php # Factory Method
│   │   ├── Observer.php          # Padrão Observer
│   │   └── ValidationStrategy.php # Padrão Strategy
│   ├── models/
│   │   ├── User.php             # Modelo de usuário
│   │   ├── Feira.php            # Modelo de feira
│   │   └── Loja.php             # Modelo de loja
│   ├── repositories/
│   │   ├── UserRepository.php    # Repository de usuários
│   │   ├── FeiraRepository.php   # Repository de feiras
│   │   └── LojaRepository.php    # Repository de lojas
│   └── views/
│       ├── auth/                # Views de autenticação
│       ├── feira/               # Views de feiras
│       ├── loja/                # Views de lojas
│       └── layouts/             # Layouts compartilhados
├── assets/
│   ├── css/
│   └── img/
├── public/
│   └── index.php                # Ponto de entrada
└── schema.sql                   # Estrutura do banco
```

## 🚀 Como Rodar o Projeto

### Pré-requisitos
- PHP 8.0 ou superior
- MySQL 5.7 ou superior
- Servidor web (Apache/Nginx) ou PHP built-in server

### Passo a Passo

1. **Clone o repositório**
   ```bash
   git clone [URL_DO_REPOSITORIO]
   cd Meu-cesto-main/site_cesto_v3
   ```

2. **Configure o banco de dados**
   ```bash
   # Crie um banco de dados MySQL
   mysql -u root -p
   CREATE DATABASE mvc_feira_loja;
   
   # Importe a estrutura
   mysql -u root -p mvc_feira_loja < schema.sql
   ```

3. **Configure as variáveis de ambiente (opcional)**
   ```bash
   # Defina as variáveis ou use os padrões
   export DB_HOST=localhost
   export DB_NAME=mvc_feira_loja
   export DB_USER=root
   export DB_PASS=sua_senha
   ```

4. **Inicie o servidor**
   ```bash
   # Opção 1: Servidor built-in do PHP
   cd public
   php -S localhost:8000
   
   # Opção 2: Configure no Apache/Nginx
   # Aponte o DocumentRoot para a pasta public/
   ```

5. **Acesse o sistema**
   - Abra o navegador em `http://localhost:8000`
   - Cadastre um novo usuário ou faça login
   - Explore as funcionalidades de gestão de feiras e lojas

### Estrutura do Banco de Dados
O arquivo `schema.sql` contém todas as tabelas necessárias:
- `users` - Usuários do sistema
- `feiras` - Informações das feiras
- `lojas` - Informações das lojas

## 🔧 Configurações Adicionais

### Logs do Sistema
Os logs são gerados automaticamente pelo padrão Observer e ficam no log de erros do PHP. Para visualizar:
```bash
tail -f /var/log/php_errors.log
```

### Personalização de Validações
Para adicionar novas regras de validação, implemente a interface `ValidationStrategy`:
```php
class MinhaValidationStrategy implements ValidationStrategy {
    public function validate(array $data): array {
        // Suas regras aqui
        return $errors;
    }
}
```

## 📝 Observações Técnicas

- **Orientação a Objetos:** Todas as classes seguem princípios SOLID
- **MVC:** Separação clara entre Model, View e Controller
- **Repository Pattern:** Camada de abstração para acesso a dados
- **Padrões GoF:** Implementação correta e justificada de 4 padrões
- **Segurança:** Senhas hasheadas, validação de entrada, proteção contra SQL injection

