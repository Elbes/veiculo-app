<h1 align="center">CRUD VEICULO</h1>

<p align="justify">Os istema consiste em aum pequeno cadastro de vepiculos e suas manutenções.
Pode servir como base para outros sistemas. Possui opção de cadastro de usuário e autenticação.
Utiliza as tecnologias PHP, Laravel, JavaScript, PostgresSQL 10, pgAdmin, Docker.</p>


# 🛠️ Abrir e rodar o projeto
 <p align="justify">O projeto está organizado em 3 containers Docker. Um container para a aplicação (PHP+Laravel). Outro para o banco de dados (PostgresSQL). E o terceiro para o PGAdmin.</p>

 <p align="justify">A utilização do Postgres e PGAdmin são opcionais. O projeto está estrutura para poder ser utilizado com qualquer banco de dados, basta realizar as configurações necessárias.</p>

 <p align="justify">Após baixar o projeto, seguir as intgruções abaixo.</p>

## Criar os containers Docker
Acesar o diretório da aplicação por linha de comando e executar:

`docker-compose up -d --build`

Serão criados 3 containers (veiculo-app, postgres_container, pgadmin4_container)

-----------------------------------------------------------------------------------------------------------------------------------------------------------
## Criar as tabelas do banco de dados 'veiculo_db'
Acessar o container veiculo-app e executar os seguintes comandos:

**Criar as tabelas** `php artisan migrate`

**Popular as tabelas** `php artisan db:seed`

-----------------------------------------------------------------------------------------------------------------------------------------------------------

<h4 align="center"> 
    :construction:  Projeto em construção  :construction:
</h4>