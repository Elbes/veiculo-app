<h1 align="center"> Cadastro de Veículos - Laravel 9 - Postgres</h1>

# 🛠️ Abrir e rodar o projeto
  O projeto está organizado em 3 containers Docker. Um container para a aplicação (PHP+Laravel). Outro para o banco de dados (PostgresSQL). E o terceiro para o PGAdmin.
  
  A utilização do Postgres e PGAdmin são opcionais. O projeto está estrutura para poder ser utilizado com qualquer banco de dados, basta realizar as configurações necessárias.

  Após baixar o projeto, seguir as intgruções abaixo.

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