##CRUD de clientes para teste técnico vaga Kabum
**Solicitação teste técnico - Kabum:**

1 - Uma área administrativa onde o(s) usuário(s) devem acessar através de login e senha.

2 - Criar um gerenciador de clientes (Listar, Incluir, Editar e Excluir)

    2.1 - O cadastro do Cliente deve conter: Nome; Data Nascimento; CPF; RG; Telefone.
    2.2 - O Cliente pode ter 1 ou N endereços.

Desenvolver preferencialmente em PHP sem utilização de frameworks, MySQL, FE: livre.  

**Requitos:**
- PHP 7.1+
- Apache com mod_rewrite
- Composer

**Configurações iniciais**
- Copiar o arquivo ```.env.example``` para ```.env```
- Definir banco de dados no arquivo ```.env```
- DOCUMENT_ROOT deve ser a pasta ```/public```
- Fazer a instalação do banco de dados, o dump está em ```database/db.sql```
- Executar o comando ```composer install```

Login:
- E-mail: admin@kabum.com.br
- Senha: admin!kabum
