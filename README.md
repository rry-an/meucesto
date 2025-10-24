
# Feira & Loja — MVC + Repository (PHP + MySQL)

## Como rodar
1. Crie o banco e as tabelas no MySQL:
   ```sql
   SOURCE schema.sql;
   ```
2. Configure as variáveis de ambiente do PHP/Apache para o banco (ou edite `app/config/Database.php`):
   - `DB_HOST` (padrão: localhost)
   - `DB_NAME` (padrão: mvc_feira_loja)
   - `DB_USER` (padrão: root)
   - `DB_PASS` (padrão: vazio)

3. Coloque a pasta `public` como DocumentRoot (ou acesse `public/index.php` diretamente).
4. Abra `index.html` para ver a página inicial com o design solicitado.

## Funcionalidades (10 obrigatórias)
1. Criar conta (registro de usuário).
2. Login (sessão).
3. Logout.
4. Cadastrar feira (create).
5. Editar feira (update) — via upsert.
6. Visualizar minha feira já cadastrada (read).
7. Listar todas as feiras (read/list).
8. Cadastrar loja (create).
9. Editar loja (update) — via upsert.
10. Listar todas as lojas (read/list).

Arquitetura: MVC + Repository (camada de persistência via *repositories* `UserRepository`, `FeiraRepository`, `LojaRepository`).

Design: `index.html` e `assets/css/style.css` conforme solicitado.
