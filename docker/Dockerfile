FROM php:7.4-fpm-alpine

# Copy composer.lock and composer.json
#COPY ../composer.lock ../composer.json /var/www/html/

WORKDIR /var/www/html

RUN docker-php-ext-install pdo pdo_mysql

#COPY ../ /var/www/html/
