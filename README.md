# Mifp (Em desenvolvimento)

Um simples projeto para acelerar o desenvolvimento de aplicações web de pequeno porte utlizando php puro e sql. O objetivo desse projeto não é automatizar o processo de criação de um backend e sim facilitar a criação utilizando o php, ou sejá não vai ter um recurso de model que automaticamente vai criar o sql e fazer migração então quem for utilizar terá que conhecer sql e a base do php orientado a objetos.

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

### Configurações

O Arquivo Configuration.php é onde se encontra todas as variáveis de configurações como conexão com banco de dados, email, migrações e etc

    ```php

        private $DATABASE = "mysql";
        private $DB_URL = "localhost";
        private $DB_NAME = "test";
        private $DB_USERNAME = "root";
        private $DB_PASSWORD = "12345";

        private $migrations = ["UserMigration"];
    ```

### Rotas

* No arquivo src/app/Routes.php existe um metodo chamado routes onde será colocado a rota seguindo o padrão:
    ```php
        public static function routes()
        {
            return [
                'get' => [
                    '/' => fn() => self::execute_controller("HomeController", "home"),
                    '/about' => fn() => self::execute_controller("HomeController", "about"),
                    '/login' => fn() => self::execute_controller("AuthController", "login"),
                    "/register" => fn() => self::execute_controller("AuthController", "register")
                ],
                'post' => [
                    '/register/save' => fn() => self::execute_controller("AuthController", "save"),
                    '/login/auth' => fn() => self::execute_controller("AuthController", "authenticate"),
                ]
            ];
        }
    ```

    O primeiro parametro é o nome do controller e o segundo é o nome do metodo.

* É recomendado que o controller tenha o nome padronizado como por exemplo "ExemploController"

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

    O metodo view() recebe 3 parametros:
    - Nome da view
    - Titulo da pagina
    - Dados caso queira mandar para a view

    No controller poderá ser chamados outras classes como Database, Email, Security e etc.

### Migrações

A pasta migrations é onde será feita as classes responsáveis que tambem é uma classe comum php so que seus metodos são chamados no proprio construtor.

    ```php
        require_once './src/app/Database.php';

        class UserMigration
        {
            // responsavel pela conexão com banco de dados
            private $database;

            public function __construct()
            {
                // Instanciando um objeto da classe responsavel pela comunicação com banco de dados
                $this->database = new Database;

                //Chamando o metodo responsavel pela criação da tabela
                $this->create_user_table();
            }

            // Metodo responsavel por criar a tabela
            public function create_user_table()
            {

                $conn = $this->database->connection();
                $sql = "
                
                    CREATE TABLE IF NOT EXISTS users(
                    
                        id INT PRIMARY KEY AUTO_INCREMENT,
                        username VARCHAR(30) UNIQUE NOT NULL,
                        email VARCHAR(150) UNIQUE NOT NULL,
                        password VARCHAR(150) NOT NULL,
                        isActive INT,
                        role INT,
                        joinedDate DateTime,
                        lastUpdate DateTIme

                    );
                
                ";

                $prep = $conn->prepare($sql);
                $prep->execute();
            }

        }

    ```

    No final basta abrir o arquivo Configuration.php que está na pasta src/app/ do projeto e adicionar a migration a lista.


    ```php
        private $migrations = ["UserMigration", "MinhaMigration"];
    ```

    Por fim é só chamar o arquivo migrate.php que está na pasta raiz do projeto utilizando o php.

    ```bash
        php migrate.php
    ```