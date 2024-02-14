FROM php:8.2

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php --  --install-dir=/usr/local/bin --filename=composer

COPY . .

RUN composer install

ENTRYPOINT ["php","artisan","serve","--host=0.0.0.0"]