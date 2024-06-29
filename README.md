## Mifp (Em desenvolvimento)

Um simples projeto para acelerar o desenvolvimento de aplicações web de pequeno porte utlizando php puro.

### Recursos

- [x] Sistemas de template
- [ ] Conexão com banco de dados(PDO)
- [ ] Tabela básica de usuário
- [ ] Login básico

### Como utilizar

* O arquivo src/Routes.php existe um metodo chamado routes onde será colocado a rota seguindo o padrão:
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