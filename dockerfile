FROM php:7.4-apache

# Instalar pdo_mysql
RUN docker-php-ext-install pdo pdo_mysql

# Copiar los archivos del proyecto a /var/www/html
COPY ./src /var/www/html

COPY ./.env /var/www/