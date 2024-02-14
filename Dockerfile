FROM debian:bookworm-slim as build-ui

WORKDIR /data

COPY . .

RUN apt update && apt install -y nodejs npm composer php-dom php-xml php-curl && php --ini && composer install && npm i && npm run build

FROM composer:2.7

WORKDIR /var/www/html

COPY . .

COPY --from=build-ui /data/public/build ./public/build

RUN composer install

ENTRYPOINT ["php","artisan","serve","--host=0.0.0.0"]