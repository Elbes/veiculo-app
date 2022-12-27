## Criar os containers Docker
Acesar o diretório da aplicação por linha de comando e executar:
'docker-compose up -d --build'

Serão criados 3 containers (veiculo-app, postgres_container, pgadmin4_container)

-----------------------------------------------------------------------------------------------------------------------------------------------------------
## Criar as tabelas do banco de dados 'veiculo_db'
Acessar o container veiculo-app e executar os seguintes comandos:
**Criar as tabelas** 'php artisan migrate'
**Popular as tabelas** 'php artisan db:seed'

-----------------------------------------------------------------------------------------------------------------------------------------------------------
## Telas:
- Cadastro de usuário
- Login
- Home - Ao estar logado devem ser mostrado as manutenções previstas para os próximos 7 dias com dados do veículo. (Utilizar uma api para buscar essas informações)
- Criar CRUD para veículos para cada usuário logado.
- Criar um CRUD para manutenções para cada veículo, incluindo a marca o modelo e a versão.


