# DEV VX CASE

## Stack de Tecnologia:  
Laravel  
Vue/Vuex  
Bulma  

 ## Instalação
 1. Instale o Docker  
 https://docs.docker.com/engine/install/
 2. Clone o repositório e acesse o diretório do projeto  
 ` git clone https://github.com/adrianoqueiroz/project-vxcase.git`  
 `cd project-vxcase`  
  
 3. Configure o ambiente  
 `cp .env.example .env`
 (defina a senha do mysql)  

4. Inicialize os containers  
 `docker-compose up -d`

5. Instale as dependências  
 ` docker exec -ti vxcase-app composer install` 
 <!-- ` docker exec -ti vxcase-app composer require guzzlehttp/guzzle`  -->

6. Gere a APP_KEY  
 `docker exec -ti vxcase-app php artisan key:generate`  

7. Popule o banco de dados mysql  
 `docker exec -ti vxcase-app php artisan migrate --seed`  
 <!-- 4. Rode o servidor  
 `docker exec -ti vxcase-app php artisan serve`   -->
 
8. Well Done! Development Server URL  
 http://localhost:8000

 ## Issues resolvidas:
* Adicionar Docker ao projeto;

* Organizar os Models em uma pasta;

* Implementar FormRequest nos Controllers

* Implementar o conceito Repositories no projeto

* Criar um command para inserir um produto via terminal

   Params:  
   nome(required), reference (optional), price (default 0), delivery_days(default 15);

   Exemplo com todos os parâmetros:  
   `php artisan product:create "Produto VX-01" "RFVX-001" "100" "15"`

   Exemplo com 01 parametro:  
   `php artisan product:create "Produto VX-02"`

* Iniciada a criação de notificação para Slack (não finalizado)