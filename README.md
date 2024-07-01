# Mifp (Em desenvolvimento)

Um simples projeto para acelerar o desenvolvimento de aplicações web de pequeno porte utlizando php puro e sql.

OBS: É um projeto pessoal mas se querer utilizar fique a vontade.

## Recursos

- [x] Sistemas de template
- [x] Conexão com banco de dados(PDO)
- [x] Tabela básica de usuário
- [ ] CRUD de usuários
- [ ] Login e Logout
- [ ] Upload de arquivos
- [ ] Função de segurança das rotas

## Como utilizar

### Rotas

* No arquivo src/app/Routes.php existe um metodo chamado routes onde será colocado a rota seguindo o padrão:
    ```php
        'get' => [
                '/' => fn() => self::execute_controller("HomeController", "home"),
                '/about' => fn() => self::execute_controller("HomeController", "about"),
            ],
        'post' => [
                '/login' => fn() => self::execute_controller("AuthController", "login"),
            ]
    ```

    O primeiro parametro é o nome do controller e o segundo é o nome do metodo.

* É recomendado que o controller tenha o nome padronizado como por exemplo "ExemploController"
* Os controllers deve herdar de Controller para que possa ter acesso ao template utilizando o metodo view:
    ```php
        class HomeController extends Controller
        {
            public function home()
            {

                return $this->view("public/home", "home");
            }
        }
    ```

* Os arquivos de view são colocados em /views alem de possuir o arquivo template.php onde poderá ser utilizado se todas as páginas tiverem template unico.

### Controllers

* Os controles são classes comuns que herdam da classe Controller. Essa herança irá da ao controller criado acesso ao metodo view() e response() onde sua funcão é retornar um html ou um Json para o usuário.
    ```php

        require './src/app/Controller.php';

        class HomeController extends Controller
        {

            public function __construct()
            {
                
            }

            public function home()
            {

                return $this->view("public/home", "home");
            }

            public function about()
            {
                return $this->view("public/about", "Sobre o site");
            }

        }

    ```

    No controller poderá ser chamados outras classes como Database, Email, Security e etc.