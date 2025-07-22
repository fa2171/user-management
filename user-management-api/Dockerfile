FROM php:8.1-fpm

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip \
    && docker-php-ext-install pdo_mysql

COPY . .

RUN curl -sS https://getcomposer.org/installer | php && \
    php composer.phar install

EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000
