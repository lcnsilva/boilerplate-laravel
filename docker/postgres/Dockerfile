FROM postgres:17-alpine


ENV POSTGRES_DB=boilerplate_db \
	POSTGRES_USER=admin

EXPOSE 5432

# If you need seed data, copy SQL files here:
# COPY ./init/*.sql /docker-entrypoint-initdb.d/

# Crie uma network para se comunicar com o banco.
# docker network create minha_network

# docker build -t nomeImagem caminho
# example: docker build -t postgres .

# docker run -d -p 5432:5432 -v nomedovolume:/var/lib/postgresql/data -e POSTGRES_PASSWORD=suaSenhaAqui --name nomeContainer nomeImagem
# example: docker run -d -p 5432:5432 -v postgres_data:/var/lib/postgresql/data -e POSTGRES_PASSWORD=suaSenhaAqui --name postgres_db postgres

# exemplo de .env
#DB_CONNECTION=pgsql
#DB_HOST=postgres_db
#DB_PORT=5432
#DB_DATABASE=boilerplate_db
#DB_USERNAME=admin
#DB_PASSWORD=suaSenhaAqui
