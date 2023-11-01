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
Acessar o container veiculo-app:

`docker exec -it veiculo-app bash`

Criar o arquivo **env**:

`cp .env.example .env`

Configurar a conexão com banco de dados no arquivo .env com os seguintes parâmetros:

`DB_CONNECTION=pgsql`
`DB_HOST=postgres_container`
`DB_PORT=5432`
`DB_DATABASE=veiculo_db`
`DB_USERNAME=admin`
`DB_PASSWORD=secret`

Baixar as dependências com composer:

`composer install`

Limpar cache na raiz da aplicação com o comando:

`php artisan cache:clear`

Executar os seguintes comandos:

**Criar as tabelas** `php artisan migrate`

**Popular as tabelas** `php artisan db:seed`

-----------------------------------------------------------------------------------------------------------------------------------------------------------
## Padronização do banco de dados

Nomeclatura dos atributos

<table>
  <colgroup span="3" class="columns"></colgroup>
    <thead>
	  <tr>
	    <th>Atributo</th>
	    <th>Descrição</th>
	    <th>Exemplo</th>
	  </tr>
	</thead>
	<tbody>
		<tr>
			<td>ID</td>
	    	<td>Utilizado na numeração das chaves primárias ou nas chaves estrangeiras relacionadas a tabelas auxiliares</td>
	    	<td>ID_VEICULO (PK), ID_VEICULO(FK)</td>
		</tr>
	</tbody>
</table>



<h4 align="center"> 
    :construction:  Projeto em construção  :construction:
</h4>