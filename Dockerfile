FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update && apt-get install -y 

WORKDIR /var/www/html

COPY . .
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

EXPOSE 80