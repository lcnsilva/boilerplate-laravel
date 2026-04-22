FROM php:8.4-fpm-alpine

RUN apk add --no-cache \
    bash curl git unzip libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

COPY ./entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

EXPOSE 8000

# docker build -t nomeImagem caminho
# docker run -d -p 8000:8000 -v caminhodapasta:/var/www/html --name nomeContainer nomeImagem
# ${PWD para pegar o caminho caso seja no powershell
# docker run -d -p 8000:8000 --name boilerplate -v "${PWD}:/var/www/html" boilerplate
