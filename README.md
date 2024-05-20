# Aplicação de Gerenciamento de Médicos, Pacientes e Atendimentos

Esta aplicação foi desenvolvida para gerenciar médicos, pacientes e atendimentos. Ela permite realizar operações de cadastro, consulta, atualização e exclusão (CRUD) para cada uma dessas entidades. O projeto foi desenvolvido utilizando Laravel e estilizado com Bootstrap.

## Tecnologias Utilizadas

- PHP 7.4
- Laravel 7.3
- MySQL
- Bootstrap 4.x
- Composer version 2.7.4

## Instalando e configurando

1. **Clonar o repositório**

   ```sh
   git clone https://github.com/Eduardo-Co/beecoffe
2. **Criar e alterar a .env**
   ```sh
   cp .env.example .env
3. Instalar as dependências
   ```sh
   composer install
4. Rodando as migrations
   ```sh
   php artisan migrate
5. Gerando a APP_KEY
   ```sh
   php artisan key:generate
6. (Opicional) Alimente o banco de dados
    ```sh
    php artisan db:seed
7. Rode a aplicação
   ```sh
   php artisan serve
   
