<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Requisitos
- PHP 8
- SQLite

## Iniciar
- O arquivo do sqlite está criado em <code>database/database.sqlite</code>, rodar as migrations <code>php artisan migrate</code>.
- Um usuário com todas permissões já estará cadastrado: <code>teste@teste.com</code> <code>123</code>.
- Quando um usuário/permissionário é cadastrado, a senha é setada automaticamente para <code>123</code>.
- Utilizar o <code>.env.example</code> como base para criar seu <code>.env</code> local.
- Rodar o comando <code>php artisan serve</code>.
