FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html
COPY ./src .

RUN php ./config/install.php
