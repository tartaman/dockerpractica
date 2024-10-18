FROM php:apache

# Instalar la extensión mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copiar archivos al contenedor
COPY ./src /var/www/html
